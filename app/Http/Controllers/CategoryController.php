<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //method 1
        $data = new Category();
        $data->name= $request->name;
        $data->description= $request->description;
        $data->save();

        //method 2
        Category::create($request->all());

        return "ok created";

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //method 1
        $data = Category::find($id);
        $data->name= $request->name;
        $data->description= $request->description;

        //method 2
        $data->fill($request->all());

        $data->save();
        return "ok updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::find($id);
        $data->delete();
        return "ok deleted";
    }
}
