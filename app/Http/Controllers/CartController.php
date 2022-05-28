<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Courier;
use App\Flower;
use App\Transactiondetail;
use App\Transactionheader;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cartPage(Request $request)
    {

        $carts = auth()->user()->cart;
        $couriers = Courier::all();

        return view('cart', compact('carts', 'couriers'));
    }

    public function checkout(Request $request)
    {
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', '=', auth()->user()->id);

        $transactionheader = Transactionheader::create([
           'user_id' => $user,
            'courier_id' => $request->courier_name,
            'date' => date('Y-m-d H:i:s')
        ]);

        foreach ($cart as $c){
            Transactiondetail::create([
                'transactionheader_id' => $transactionheader->id,
                'flower_id' => $c->flower_id,
                'qty' => $c->qty
            ]);
        }

        if($cart != null){
            Cart::where('user_id', '=', auth()->user()->id)->delete();
        }else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|integer|min:1'
        ]);

        $user = auth()->user()->id;
        $flower = Flower::find($request->route('id'));
        $cart = Cart::where('user_id', '=', auth()->user()->id, 'AND', 'flower_id', '=', $flower->id)->first();

        if($cart->first() != null){
            Cart::where('flower_id', $cart->flower_id)->update([
                'user_id' => auth()->user()->id,
                'flower_id' => $flower->id,
                'qty' => $cart->qty + $request->qty
            ]);
        }else{
            Cart::create([
                'user_id' => $user,
                'flower_id' => $flower->id,
                'qty' => $request->qty
            ]);
        }

        Flower::where('id', $request->route('id'))->update([
            'stock' => $flower->stock - $request->qty
        ]);

        return redirect('/');
    }

    public function order(Request $request)
    {
        $user = auth()->user()->id;
        $flower = Flower::find($request->route('id'));
        $cart = Cart::where('user_id', '=', auth()->user()->id, 'AND', 'flower_id', '=', $flower->id)->first();

        if($cart->first() != null){
            Cart::where('flower_id', $cart->flower_id)->update([
            'user_id' => auth()->user()->id,
            'flower_id' => $flower->id,
            'qty' => $cart->qty + 1
        ]);
        }else{
            Cart::create([
                'user_id' => auth()->user()->id,
                'flower_id' => $flower->id,
                'qty' => 1
            ]);
        }
        Flower::where('id', $request->route('id'))->update([
            'stock' => $flower->stock - 1
        ]);

        return redirect('/');
    }

    public function deleteCart(Request $request){
        Cart::where('id', $request->route('id'))->delete();
        return redirect('/cart');
    }

}
