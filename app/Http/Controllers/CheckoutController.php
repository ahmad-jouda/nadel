<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;
        $meals = Cart::with('meal')
            ->where('user_id', $user_id)
            ->orWhere('id', $request->cookie('cart_id'))
            ->get();

        if (!$meals) {
            return redirect()->route('cart');
        }

        $total = $meals->sum(function($item) {
            return $item->meal->final_price * $item->quantity;
        });

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user_id,
                'total' => $total,
            ]);

            foreach ($meals as $item) {
                $order->items()->create([
                    'meal_id' => $item->meal_id,
                    'quantity' => $item->quantity,
                    'price' => $item->meal->final_price,
                ]);
            }

            Cart::where('user_id', $user_id)
                ->orWhere('id', $request->cookie('cart_id'))
                ->delete();

            DB::commit();

            //event(new OrderCreated($order));
            //$user->notify(new OrderCreatedNotification($order));

            // SELECT * from users where type in ('admin', 'super-admin')
            //$users = User::whereIn('type', ['super-admin', 'admin'])->get();
            //Notification::send($users, new OrderCreatedNotification($order));

            return redirect()->route('orders')->with('success', 'Order created');

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
