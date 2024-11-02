<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    function getAllReaders(){
        // SELECT * FROM READERS;
        $data = Reader::all();
        return $data;
    }

    function getReaderById($id){
        // SELECT * FROM READERS WHERE ID=?
        $data = Reader::find($id);
        return $data;
    }

    function getReaderByIdOrFail($id){
        // SELECT * FROM READERS WHERE ID=?
        $data = Reader::findOrFail($id);
        return $data;
    }

    function getReaderByIdOr($id){
        // SELECT * FROM READERS WHERE ID=?
        $data= Reader::findOr($id,function(){
            return "The id does not exist";
        });
        return $data;
    }

    function getReaderWhereBalance100(){
        // SELECT * FROM READERS WHERE BALANCE=100;
        $data = Reader::where('balance','100')
                        ->get();
        return $data;
    }

    function getReaderWhereBalanaceGt100(){
        // SELECT * FROM READERS WHERE BALANCE > 100;
        $data = Reader::where('balance','>','100')
            ->get();
        return $data;
    }

    function getReaderWhereBalanaceLt100(){
        // SELECT * FROM READERS WHERE BALANCE <= 100;
        $data = Reader::where('balance','<=','100')
            ->get();
        return $data;
    }

    function getFirstReaderWhereBalanaceLt100(){
        // SELECT * FROM READERS WHERE BALANCE <= 100;
        $data = Reader::where('balance','<=','100')
            ->first();
        return $data;
    }

    function getFirstOrFailReaderWhereBalanaceLt0(){
        // SELECT * FROM READERS WHERE BALANCE <= 0;
        $data = Reader::where('balance','<','0')
            ->firstOrFail();
        return $data;
    }

    function getFirstOrReaderWhereBalanaceLt0(){
        // SELECT * FROM READERS WHERE BALANCE <= 0;
        $data = Reader::where('balance','<','0')
            ->firstOr(function(){
                return "There is no data";
            });
        return $data;
    }

    function getReadersWhereBalanceGt100AndIsEditor(){
        // SELECT * FROM READERS WHERE BALANCE> 100 AND IS_EDITOR=TRUE;
        $data = Reader::where('balance','>=',100)
                      ->where('is_editor',true)
                      ->get();
        return $data;
    }

    function getReadersWhereBalanaceGt100OrIsEditor(){
        // SELECT * FROM READERS WHERE BALANCE > 100 OR IS_EDITOR=FALSE;
        $data = Reader::where('balance',100)
            ->OrWhere('is_editor',false)
            ->get();
        return $data;
    }

    function getReadersWhereIn(){
        // SELECT * FROM READERS WHERE ID IN (1,2,3);
        // SELECT * FROM READERS WHERE ID=1 OR ID=2 OR ID=3
        $data= Reader::whereIn('id',[1,2,3])
            ->get();
        return $data;
    }

    function getReadersWhereBetween(){
        // SELECT * FROM READERS WHERE BALANCE BETWEEN 100 AND 200
        $data = Reader::whereBetween('balance',[100,200])->get();
        return $data;
    }

    function getReadersWithLimit(){
        // SELECT * FROM READERS WHERE ID>0 LIMIT 2;
        $data = Reader::where('id','>','0')->take(2)->get();
        return $data;
    }

    function getNameBalanceReadersWithLimit(){
        // SELECT name, balance FROM READERS WHERE ID>0;
        $data = Reader::where('id','>','0')
            ->select(['name','balance'])
            ->get();
        return $data;
    }

    function getReadersOrderBybalanceAsc(){
        $data = Reader::where('id','>','0')
            ->orderBy('balance','asc')
            ->get();
        return $data;
    }

    function getReadersOrderBybalanceDesc(){
        $data = Reader::where('id','>','0')
            ->orderBy('balance','desc')
            ->get();
        return $data;
    }

    function getMaxBalanceFromReader(){
        // SELECT MAX(BALANACE) FROM READERS;
        $data= Reader::max('balance');
        return $data;
    }

    function getMinBalanceFromReader(){
        // SELECT MIN(BALANACE) FROM READERS;
        $data= Reader::min('balance');
        return $data;
    }

    function getCountBalanceFromReader(){
        // SELECT COUNT(BALANACE) FROM READERS;
        $data= Reader::count('balance');
        return $data;
    }

    function getAvgBalanceFromReader(){
        // SELECT AVG(BALANACE) FROM READERS where id>1;
        $data= Reader::where('id','>','1')->avg('balance');
        return $data;
    }


    function getRelation(){
        //SELECT authors.NAME, books.title, books.brief from authors,books where authors.id= books.author_id;
        $data = Author::join('books','authors.id','books.author_id')
            ->select(['authors.name as author_name','books.title','books.brief'])
            ->get();
        return $data;
    }

    function getRelation2(){
        $data = Book::join('authors','authors.id','books.author_id')
            ->get();
        return $data;
    }


    function addReader1(){
        $data = new Reader();
        $data->name='Reader 6';
        $data->balance= 500;
        $data->is_editor=true;
        $data->save();
        return response()->json(['msg'=>'created']);
    }

    function addReader2(Request $request){
        $data = new Reader();
        $data->name=$request->name;
        $data->balance= $request->balance;
        $data->is_editor=$request->is_editor;
        $data->save();
        return response()->json(['msg'=>'created']);
    }

    function addReader3(){
        Reader::create([
            'name'=>'Reader 8',
            'balance'=>500,
            'is_editor'=>true
        ]);
        return response()->json(['msg'=>'created']);
    }

    function addReader4(Request $request){
        Reader::create([
            'name'=> $request->name,
            'balance'=> $request->balance,
            'is_editor'=>$request->is_editor,
        ]);
        return response()->json(['msg'=>'created']);
    }

    function addReader5(Request $request){
        Reader::create($request->all());
        return response()->json(['msg'=>'created']);
    }

}
