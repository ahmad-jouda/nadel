<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('carts');
        
        $carts = Cart::paginate();
        $total = $carts->sum(function($item) {
            return $item->quantity * $item->meal->final_price;
        });

        return view('admin.cart.index',[
            'carts' => $carts,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        Gate::authorize('carts.delete');
        
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
