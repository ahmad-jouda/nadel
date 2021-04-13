<?php

namespace App\Http\Controllers;

use App\Models\Admin\Meal;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('id', $this->getCartId())
            ->orWhere('user_id', Auth::id())->get();

        $total = $cart->sum(function($item) {
            return $item->quantity * $item->meal->final_price;
        });

        

        return view('cart', [
            'items' => $cart,
            'total' => $total,
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'meal_id' => ['required', 'exists:meals,id'],
            'quantity' => ['int', 'min:1'],
        ]);
        $cart = Cart::udateOrCreate([
            'id' => $this->getCardId(),
            'meal_id' => $request->post('meal_id'),
        ], [
            'quantity' => DB::raw('quantity + ' . $request->post('quantity', 1)),
            'user_id' => Auth::id(),
        ]);

        $name = $cart->meal->name;
        return redirect()->back()->with('status', "Meal $name added to cart");
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantity' => ['required', 'array'],
        ]);

        $that = $this;
        foreach ($request->post('quantity') as $meal_id => $quantity) {
            Cart::where('meal_id', $meal_id)
                ->where(function($query) use ($that) {
                    $query->where('id', '=', $that->getCartId())
                        ->orWhere('user_id', '=', Auth::id());
                })->update([
                    'quantity' => $quantity,
                ]);
        }
        
        return redirect()->back()->with('status', "Cart updated");
        
    }

    public function destroy() 
    {
        Cart::where('id', '=', $this->getCardId())->orwhere('user_id', Auth::id())->delete();
        $cookie = Cookie::make('cart_id', '', -60);
        return redirect()->back()->with('status', "Cart cleared")->cookie($cookie);
    }

    protected function getCardId()
    {
       $id = request()->cookie('cart_id');
       if(!$id) {
           $id = Str::uuid();
           Cookie::queue('cart_id', $id, 60 * 24 * 7);
        }
        
        return $id;
    }

}
