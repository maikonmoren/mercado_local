<?php
namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\AuthController;
use App\Http\Requests\Merchant\LoginMerchantRequest;
use App\Models\AdminUser;
use App\Models\MerchantUser;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTGuard;

class AuthMerchantController extends AuthController
{
    protected JWTGuard $guard;

    public function __construct()
    {
        $this->middleware('auth:merchant' , ['except' => ['login']]);
        $this->guard = $this->getGuard();
    }

    public function login( Request $request )
    {
        $credentials = LoginMerchantRequest::validate($request);

        if($token = $this->guard->attempt($credentials)) return response()->json( [$token],201);

        return response()->json(['message' => ['Senha ou E-mail inválido']]);

    }

    public function getGuard()
    {
        return auth('merchant');
    }
}
