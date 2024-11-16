<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function rendercreate(){
        return view('create');
    }

    public function saveproduct(Request $request){
        $request->validate([
            'name'=>'required|max:6',
            'price'=>'required|numeric',
            'description'=>'required|min:6'
        ]);

//        $data = new Product();
//        $data->name=$request->name;
//        $data->price= $request->price;
//        $data->description= $request->description;
//        $data->save();
        Product::create($request->all());
        return redirect()->route('product-list');
    }

    public function listproduct(){
        $data = Product::all();
        return view('plist')->with('data',$data);
    }

    public function viewproduct($id){
        $data = Product::find($id);
        return view('pview')->with('data',$data);
    }

    public function pedit($id){
        $data = Product::find($id);
        return view('edit')->with('data',$data);
    }

    public function pupdate(Request $request,$id){
        $data = Product::find($id);
        //method 1
        $data->name=$request->name;
        $data->price= $request->price;
        $data->description= $request->description;
        //method 2
        $data->fill($request->all());

        $data->save();
        return redirect()->route('product-list');
    }

    public function pdelete($id){
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product-list');
    }
}
