<?php

namespace App\Http\Controllers;

use App\Flowertype;
use Illuminate\Http\Request;

class FlowertypeController extends Controller
{
    //
    public function insertFlowertypePage(){
        return view('insertFlowertype');
    }

    public function updateFlowertypePage(Request $request){
        $flowertype = Flowertype::find($request->route('id'));
        return view('updateFlowertype', compact('flowertype'));
    }

    public function insertFlowertype(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:App\Flowertype'
        ]);

        Flowertype::create([
            'name' => $request->name
        ]);
        return redirect('/manageflowertype');
    }

    public function updateFlowertype(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:App\Flowertype'
        ]);

        Flowertype::where('id', $request->route('id'))-> update([
           'name' => $request->name
        ]);
        return redirect('/manageflowertype');
    }

    public function deleteFlowertype(Request $request){
        Flowertype::where('id', $request->route('id'))->delete();
        return redirect('/manageflowertype');
    }

    public function manageFlowertype(Request $request){
        $search_query = $request->query('q');
        $flowertypes = Flowertype::where('name',"LIKE", "%$search_query%")->paginate(10)->appends(['q'=>$search_query]);
        return view('manageFlowertype', compact('flowertypes'));
    }
}
