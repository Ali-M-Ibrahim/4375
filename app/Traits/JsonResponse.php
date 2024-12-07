<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait JsonResponse{

    function SuccessResponse($content, $code){
        return response()->json(['success'=>$content, 'the error code is'=>$code],$code);
    }

    function ErrorResponse($content, $code){
        return response()->json(['error'=>$content, $code=>$code],$code);
    }
}
