<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    //
    public function insertCourierPage(){
        return view('insertCourier');
    }

    public function updateCourierPage(Request $request){
        $courier = Courier::find($request->route('id'));
        return view('updateCourier', compact('courier'));
    }

    public function insertCourier(Request $request){
        $this->validate($request, [
            'courier_name' => 'required|min:3',
            'courier_cost' => 'required|integer|min:3000'
        ]);

        Courier::create([
            'name' => $request->courier_name,
            'cost' => $request->courier_cost
        ]);
        return redirect('/managecourier');
    }

    public function updateCourier(Request $request){
        $this->validate($request, [
            'courier_name' => 'required|min:3',
            'courier_cost' => 'required|integer|min:3000'
        ]);

        Courier::where('id', $request->route('id'))-> update([
            'name' => $request->courier_name,
            'cost' => $request->courier_cost
        ]);
        return redirect('/managecourier');
    }

    public function deleteCourier(Request $request){
        Courier::where('id', $request->route('id'))->delete();
        return redirect('/managecourier');
    }

    public function manageCourier(Request $request){
        $search_query = $request->query('q');
        $couriers = Courier::where('name',"LIKE", "%$search_query%")->paginate(10)->appends(['q'=>$search_query]);
        return view('manageCourier', compact('couriers'));

    }
}
