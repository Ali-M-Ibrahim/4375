<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class TraitController extends Controller
{
    use JsonResponse;

    public function index(){
        $data = "This is my data";
        return $this->SuccessResponse($data,200);
    }

    public function error(){
        $msg = "Internal server error";
        return $this->ErrorResponse($msg,500);
    }

}
