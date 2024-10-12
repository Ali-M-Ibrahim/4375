<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\invokableController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('route-one',function(){
   return "Hello, I am the first route";
});

Route::get('route-two',function(){
   $a=5;
   $b=4;
   $c=$a+$b;
   return $c;
});

Route::get('route-three',function(){
  return response()->json(["firstname"=>"Ali","Lastname"=>"Ibrahim"]);
});

Route::get('route-four',function(){
   return true;
});

Route::get('route-five',function(){
    return response()->json(["firstname"=>"Ali","Lastname"=>"Ibrahim"])
        ->header('myKey',"This is my key")
        ->header('mySecondKey',"this is my second key");
});

Route::get('route-six',function(){
    return response()->json(["firstname"=>"Ali","Lastname"=>"Ibrahim"])
    ->withHeaders([
        'key1'=>'key1',
        'key2'=>'key2'
    ]);
});

Route::get('route-seven/{id}',function($id){
   return "The parameter used is " . $id;
});

Route::get('route-eight/{id}/{name}',function($id,$name){
    return "The first parameter is: " .$id . " and the second parameter is: " . $name;
});

Route::get('route-nine/{id?}',function($id=0){
    return "The parameter used is " . $id;
});

Route::get('route-ten',function(){
    return "hello";
})->name('my-route');



//method 1 recommended
Route::get('route-eleven',[BasicController::class,'myfunction1']);

//method 2
Route::get('route-twelve','App\Http\Controllers\BasicController@myfunction2');

//not recommended
Route::get('route-13',[
   'uses'=> 'App\Http\Controllers\BasicController@myfunction2',
    'as'=>'my-second-route'
]);

Route::get('route-14/{id}',[BasicController::class,'myfunction3']);

Route::resource('product',ResourceController::class);
Route::resource('product1',ResourceController::class)->only(['index','create']);
Route::resource('product2',ResourceController::class)->except(['index']);


Route::apiResource('api-resource',ApiController::class);


Route::get('route-15',invokableController::class);
