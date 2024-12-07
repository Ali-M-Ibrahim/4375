<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\invokableController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DIController;
use App\Http\Controllers\TraitController;


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
//Route::resource('product',ResourceController::class);
//Route::resource('product1',ResourceController::class)->only(['index','create']);
//Route::resource('product2',ResourceController::class)->except(['index']);
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
Route::put('updateReader1/{id}',[ReaderController::class,'updateReader1']);
Route::put('updateReader2/{id}',[ReaderController::class,'updateReader2']);
Route::get('massUpdate',[ReaderController::class,'massUpdate']);
Route::delete('delete/{id}',[ReaderController::class,'delete']);
Route::get('massDelete',[ReaderController::class,'massDelete']);




Route::apiResource('category',CategoryController::class);


Route::get('first-page',[ViewController::class,'index']);
Route::get('second-page',[ViewController::class,'index2']);
Route::get('third-page',[ViewController::class,'index3']);
Route::get('view-category/{id}',[ViewController::class,'viewcategory']);
Route::get('list-category',[ViewController::class,'listcategory']);
Route::get('child-page',[ViewController::class,'child']);
Route::get('child-page2',[ViewController::class,'child2']);


Route::get('create-product',[ProductController::class,'rendercreate'])->name('product-add');
Route::post('save-product',[ProductController::class,'saveproduct'])->name('product-save');
Route::get('list-product',[ProductController::class,'listproduct'])->name('product-list');
Route::get('view-product/{id}',[ProductController::class,'viewproduct'])->name('product-view');
Route::get('edit-product/{id}',[ProductController::class,'pedit'])->name('product-edit');
Route::put('update-product/{id}',[ProductController::class,'pupdate'])->name('product-update');
Route::get('delete-product/{id}',[ProductController::class,'pdelete'])->name('product-delete');
Route::delete('delete-product2/{id}',[ProductController::class,'pdelete'])->name('product-delete2');



Route::resource('product',ProductRController::class);

Route::get('upload-image',[ImageController::class,'index']);
Route::post('upload1',[ImageController::class,'store1'])->name('method1');
Route::get('display-image/{id}',[ImageController::class,'display']);
Route::post('upload2',[ImageController::class,'store2'])->name('method2');
Route::post('upload3',[ImageController::class,'store3'])->name('method3');


Route::get('beforedi',[DIController::class,'beforedi']);
Route::get('methoddi',[DIController::class,'methoddi']);
Route::get('constructdi1',[DIController::class,'f1'])->middleware('alikey');
Route::get('constructdi2',[DIController::class,'f2']);

//
//Route::middleware('alikey')->group(function () {
//    Route::get('beforedi',[DIController::class,'beforedi']);
//    Route::get('methoddi',[DIController::class,'methoddi']);
//});

Route::get('trait1',[TraitController::class,'index']);;
Route::get('trait2',[TraitController::class,'error']);;
