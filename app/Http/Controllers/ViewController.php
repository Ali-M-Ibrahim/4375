<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        $string = "The course name is: Web progamming 2";
        $teacher = "Ali Ibrahim";
        $date= "09/11/2024";
        $this->prepareData();
        return view('FirstPage',['data1'=>$string, 'data2'=>$teacher,'data3'=>$date]);
    }

    public function index2(){
        $data1 = "The course name is: Web progamming 2";
        $data2 = "Ali Ibrahim";
        $data3= "09/11/2024";
        $this->prepareData();
        return view('FirstPage',compact('data1','data2','data3'));
    }

    public function index3(){
        $string = "The course name is: Web progamming 2";
        $teacher = "Ali Ibrahim";
        $date= "09/11/2024";
        $this->prepareData();
        return view('FirstPage')
            ->with('data1',$string)
            ->with('data2',$teacher)
            ->with('data3',$date);
    }

    function prepareData()
    {
        $numberofcredits = "The number of credits is: 3";
        \View::share(['nbofcredits'=>$numberofcredits]);
    }

    function viewcategory($id)
    {
        $data = Category::findOrFail($id);
        return view('viewcategory')->with('data',$data);

    }

    function listcategory(){
        $data = Category::all();
        return view('listcategory')->with('data',$data);

    }

    function child()
    {
        return view('childpage');
    }

    function child2()
    {
        return view('childpage2');
    }

}
