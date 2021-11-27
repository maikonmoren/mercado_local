<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

abstract class AuthController extends Controller
{

    abstract public function login(Request $request);
    abstract public function getGuard();

    public function __construct()
    {
        $this->middleware('auth:client' , ['except' => ['login']]);
        $this->guard = $this->getGuard();
    }

    final public function refresh(){
            try{
                return response( $this->guard->refresh() );
            }catch(Exception $e) {

            }
            return response( null, 401 );
    }
    final public function logout(){
        try {
          $this->guard->invalidate();
          return response( null );
        } catch (\Throwable $th) { }
        return response( null, 401 );
    }
}
