<?php

namespace App\Http\Controllers;

use App\Services\LoggerService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DIController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'alikey',

        ];
    }

    private $loggerService;
    public function __construct(LoggerService $logger){
        $this->loggerService=$logger;
    }
    public function beforedi(){
        $b= new LoggerService();
        $b->log("this is my message before dependency injection");
    }
    public function methoddi(LoggerService $b){
        $b->log("This is my message with method dependency injection");
    }

    public function f1(){

        $this->loggerService->log("This is my message with constructor DI from f1");
        return "ok";
    }
    public function f2(){
        $this->loggerService->log("This is my message with constructor DI from f2");

    }
}
