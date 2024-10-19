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

    function myfunction4(Request $request){
        //method 1
        $firstname= $request->firstname;
        $lastname = $request->lastname;
        $gender= $request->gender;

        //method 2
        $firstname= $request->input('firstname',"joe");
        $lastname = $request->input('lastname',"doe");
        $gender= $request->input('gender',"NA");

        $ip = $request->ip();
        $secret = $request->header('secret');
        return $secret;
        return "the data are:  firstname: " . $firstname . " and lastname is: " . $lastname . " and gender: ".$gender;
    }
}
