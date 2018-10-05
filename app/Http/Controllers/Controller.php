<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user,$company;
  
    /**
    * Constructor, process the auth users;
    */
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            $this->company = $this->user->company;
            return $next($request);
        });
    }

    /**
    * Success response for api calls
    */
    public function successResponse($message, $data=array()){
    	return response()->json(['data'=>$data,'message'=>$message,'errors'=>[]],200,[],JSON_PRETTY_PRINT);
    }

    /**
    * Failed response for api calls
    */
    public function errorResponse($message, $errors=array()){
    	return response()->json(['data'=>[],'message'=>$message,'errors'=>$errors],404,[],JSON_PRETTY_PRINT); 
    }
}
