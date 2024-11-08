<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\invokableController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ReaderController;

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

Route::post('route-16',[BasicController::class,'myfunction4']);
Route::put('route-17',[BasicController::class,'myfunction4']);
Route::patch('route-18',[BasicController::class,'myfunction4']);
Route::delete('route-19',[BasicController::class,'myfunction4']);

Route::get('getBooksFromAuthor',[RelationshipController::class,'getBooksFromAuthor']);
Route::get('getAuthorFromBook',[RelationshipController::class,'getAuthorFromBook']);
Route::get('getDetailsFromBook',[RelationshipController::class,'getDetailsFromBook']);
Route::get('getBookFromDetail',[RelationshipController::class,'getBookFromDetail']);
Route::get('getBooksFromReader',[RelationshipController::class,'getBooksFromReader']);
Route::get('getReadersFromBook',[RelationshipController::class,'getReadersFromBook']);

Route::get('getAllReaders',[ReaderController::class,'getAllReaders']);
Route::get('getReaderById/{id}',[ReaderController::class,'getReaderById']);
Route::get('getReaderByIdOrFail/{id}',[ReaderController::class,'getReaderByIdOrFail']);
Route::get('getReaderByIdOr/{id}',[ReaderController::class,'getReaderByIdOrFail']);
Route::get('getReaderWhereBalance100',[ReaderController::class,'getReaderWhereBalance100']);
Route::get('getReaderWhereBalanaceGt100',[ReaderController::class,'getReaderWhereBalanaceGt100']);
Route::get('getReaderWhereBalanaceLt100',[ReaderController::class,'getReaderWhereBalanaceLt100']);
Route::get('getFirstReaderWhereBalanaceLt100',[ReaderController::class,'getFirstReaderWhereBalanaceLt100']);
Route::get('getFirstOrFailReaderWhereBalanaceLt0',[ReaderController::class,'getFirstOrFailReaderWhereBalanaceLt0']);
Route::get('getFirstOrReaderWhereBalanaceLt0',[ReaderController::class,'getFirstOrReaderWhereBalanaceLt0']);
Route::get('getReadersWhereBalanceGt100AndIsEditor',[ReaderController::class,'getReadersWhereBalanceGt100AndIsEditor']);
Route::get('getReadersWhereBalanaceGt100OrIsEditor',[ReaderController::class,'getReadersWhereBalanaceGt100OrIsEditor']);
Route::get('getReadersWhereIn',[ReaderController::class,'getReadersWhereIn']);
Route::get('getReadersWhereBetween',[ReaderController::class,'getReadersWhereBetween']);
Route::get('getReadersWithLimit',[ReaderController::class,'getReadersWithLimit']);
Route::get('getNameBalanceReadersWithLimit',[ReaderController::class,'getNameBalanceReadersWithLimit']);
Route::get('getReadersOrderBybalanceAsc',[ReaderController::class,'getReadersOrderBybalanceAsc']);
Route::get('getReadersOrderDesc',[ReaderController::class,'getReadersOrderBybalanceDesc']);
Route::get('getMaxBalanceFromReader',[ReaderController::class,'getMaxBalanceFromReader']);
Route::get('getMinBalanceFromReader',[ReaderController::class,'getMinBalanceFromReader']);
Route::get('getCountBalanceFromReader',[ReaderController::class,'getCountBalanceFromReader']);
Route::get('getAvgBalanceFromReader',[ReaderController::class,'getAvgBalanceFromReader']);
Route::get('getRelation',[ReaderController::class,'getRelation']);
Route::get('getRelation2',[ReaderController::class,'getRelation2']);
Route::get('addReader1',[ReaderController::class,'addReader1']);
Route::post('addReader2',[ReaderController::class,'addReader2']);
Route::get('addReader3',[ReaderController::class,'addReader3']);
Route::post('addReader4',[ReaderController::class,'addReader4']);
Route::post('addReader5',[ReaderController::class,'addReader5']);



