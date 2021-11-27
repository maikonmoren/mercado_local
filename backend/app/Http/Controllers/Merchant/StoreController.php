<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

     public function read(string $store)
    {
        $store = Store::find($store);
        return response()->json($store , 201);
    }

    public function create(Request $request)
    {

        $merchant = Auth::guard('merchant')->user();

        $data = CreateStoreRequest::validate($request);

        $new_store = new Store($data);
        $new_store->creator()->associate($merchant);

        if ($new_store->save()) {

            if ($categories = $data['categories']) {
                foreach ($categories as &$categorie) {
                    if (!is_numeric($categories)) unset($categorie);
                }
                $new_store->categories()->sync($categories);
            }

            return response()->json($new_store, 201);
        }

        return response()->json(['message' => 'Erro ao criar a loja']);
    }

    public function update(Request $request, string $store)
    {
        try{

        $store = Store::find($store)->first();

        $data = UpdateStoreRequest::validate($request);

        if($store->update($data)) {
            if ($categories = @$data['categories']) {
                foreach ($categories as &$categorie) {
                    if (!is_numeric($categories)) unset($categorie);
                }
                $store->categories()->sync($categories);
            }

            return response()->json($store, 201);
        }
    }catch(Exception $e){
        return $e;
    }

        return response()->json(['message' => 'Erro ao atualizar a loja']);

    }


    public function desactive(string $store)
    {
        $store = Store::find($store)->first();
        if($store->delete()) return response()->json(['message' => ['Loja Apagada']]);
        return response()->json(['message' => ['Erro ao apgar a loja']]);
    }


}
