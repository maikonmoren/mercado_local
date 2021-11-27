<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\CreateMerchantRequest;
use App\Http\Requests\Merchant\UpdateMerchantRequest;
use App\Models\MerchantUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    protected array $data = [];

    public function create(Request $request)
    {
        $data = CreateMerchantRequest::validate($request);

        $new_user = new  MerchantUser($data);
        if ($new_user->save()) return response()->json($new_user, 201);

        return response()->json(['message' => 'Erro ao registrar tente novamente mais']);
    }

    public function me(){

        return response()->json(Auth::guard('merchant')->user(),201);

    }

    public function update(Request $request){

            $me = Auth::guard('merchant')->user();
            $data = UpdateMerchantRequest::validate($request);
            $me = MerchantUser::find($me)->first();
            if($me->update($data)) return response()->json($me);

        return response()->json(["message" => ['Erro ao salvar']],401);
    }
}
