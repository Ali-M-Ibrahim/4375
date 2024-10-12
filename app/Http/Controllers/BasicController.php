<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    function myfunction1(){
        return "Hello, I am function from basic controller";
    }

    function myfunction2(){
        return response()->json(['message'=>"data from controller"]);
    }

    function myfunction3($id){
        return "Hello, the parameter is: " . $id;
    }
}
