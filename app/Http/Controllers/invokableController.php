<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return "hello i am the invokable function";
    }
}
