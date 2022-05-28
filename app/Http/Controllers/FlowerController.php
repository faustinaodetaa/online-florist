<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Flower;
use App\Flowertype;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    //
    public function insertFlowerPage(){
        $flowertypes = Flowertype::all();
        return view('insertFlower', compact('flowertypes'));
    }

    public function updateFlowerPage(Request $request){
        $flower = Flower::find($request->route('id'));
        $flowertypes = Flowertype::all();
        return view('updateFlower', compact('flower', 'flowertypes'));
    }

    public function detailFlowerPage(Request $request){
        $flower = Flower::find($request->route('id'));
        return view('detail', compact('flower'));
    }

    public function insertFlower(Request $request){
        $this->validate($request, [
            'flower_name' => 'required|string|min:3',
            'flower_price' => 'required|integer|min:10000',
            'flower_stock' => 'required|integer|min:1',
            'flower_type' => 'required|not_in:0',
            'flower_description' => 'required|min:20|max:200',
            'flower_image' => 'mimes:png,jpg,jpeg|required'
        ]);

        $type = Flowertype::where('name', $request->get('flower_type'))->first();
        $filename = time() . '.' . $request->flower_image->extension();
        $request->flower_image->move(public_path('storage'),$filename);

        Flower::create([
            'flowertype_id' => $type->id,
            'name' => $request->flower_name,
            'price' => $request->flower_price,
            'stock' => $request->flower_stock,
            'description' => $request->flower_description,
            'image' => $filename
        ]);
        return redirect('/manageflower');

    }

    public function updateFlower(Request $request){
        $this->validate($request,[
            'flower_name' => 'required|string|min:3',
            'flower_price' => 'required|integer|min:10000',
            'flower_stock' => 'required|integer|min:1',
            'flower_type' => 'required|not_in:0',
            'flower_description' => 'required|min:20|max:200',
            'flower_image' => 'mimes:png,jpg,jpeg|required'
        ]);

        $type = Flowertype::where('name', $request->get('flower_type'))->first();
        $filename = time() . '.' . $request->flower_image->extension();
        $request->flower_image->move(public_path('storage'),$filename);

        Flower::where('id', $request->route('id'))->update([
            'flowertype_id' => $type->id,
            'name' => $request->flower_name,
            'price' => $request->flower_price,
            'stock' => $request->flower_stock,
            'description' => $request->flower_description,
            'image' => $filename
        ]);
        return redirect('/manageflower');
    }

    public function deleteFlower(Request $request){
        Flower::where('id', $request->route('id'))->delete();
        return redirect('/manageflower');
    }

    public function index(Request $request){
        $search_query = $request->query('q');
        $flowers = Flower::where('name',"LIKE", "%$search_query%")->paginate(10)->appends(['q'=>$search_query]);
        return view('home', compact('flowers'));
    }

    public function manageFlower(Request $request){
        $search_query = $request->query('q');
        $flowers = Flower::where('name',"LIKE", "%$search_query%")->paginate(10)->appends(['q'=>$search_query]);
        return view('manageFlower', compact('flowers'));
    }

    public function orderFlower($id){
//        $user = auth()->user()->id;
//        $flower = Flower::find($request->route('id'));
//        $cart = Cart::find($request->route('id'));
////        $cart = Cart::all()[$id];
//
//        if($user->cart == null){
//            Cart::create([
//                'user_id' => $user,
//                'flower_id' => $flower->id,
//                'qty' => 1
//            ]);
//
//        }
////        else if($cart->flower_id == null){
//            Cart::where('id', $request->route('id'))->update([
//                'user_id' => $user,
//                'flower_id' => $flower->id,
//                'qty' => $cart->qty + 1
//            ]);
//        }


//        if($cart->flower_id != null){
//            Cart::where('id', $request->route('id'))->update([
//                'user_id' => $user,
//                'flower_id' => $flower->id,
//                'qty' => $cart->qty + 1
//            ]);
//        }

        $flower = Flower::findOrFail($id);
        $user = auth()->user()->id;
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        }else{
            $cart[$id] = [
                'user_id' => $user,
                'flower_id' => $flower->id,
                'qty' => 1
            ];
        }




        return redirect('/');
    }

}
