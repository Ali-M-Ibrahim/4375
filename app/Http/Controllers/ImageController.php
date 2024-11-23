<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        return view('uploadimage');
    }

    public function display($id){
        $data= Image::find($id);
        return view('displayimage')->with('data',$data);
    }
    public function store1(Request $request){
        if($request->hasFile('myfile')){
            // I am getting the original image name
            $originalName= $request->file('myfile')->getClientOriginalName();
            // I am concatinating image name with timestamp
            $filename = time() . '-'.$originalName;
            //upload image to public
            $request->file('myfile')->move('images',$filename);

            $data = new Image();
            $data->name=$originalName;
            $data->path= 'images/'.$filename;
            $data->save();

            return "ok image created";
        }else{
            return "missing image or encoding type";
        }
    }

    public function store2(Request $request){
        if($request->hasFile('myfile')){
            // I am getting the original image name
            $originalName= $request->file('myfile')->getClientOriginalName();
            // I am concatinating image name with timestamp
            $filename = time() . '-'.$originalName;
            //upload image to public
            $request->file('myfile')->storeAs('images1',$filename,'public');

            $data = new Image();
            $data->name=$originalName;
            $data->path= '/storage/images1/'.$filename;
            $data->save();

            return "ok image created";
        }else{
            return "missing image or encoding type";
        }
    }

    public function store3(Request $request){
        if($request->hasFile('myfile')){
            // I am getting the original image name
            $originalName= $request->file('myfile')->getClientOriginalName();

            //upload image to public
            $filepath = $request->file('myfile')->store('images2','public');

            $data = new Image();
            $data->name=$originalName;
            $data->path= '/storage/'. $filepath;
            $data->save();

            return "ok image created";
        }else{
            return "missing image or encoding type";
        }
    }
}
