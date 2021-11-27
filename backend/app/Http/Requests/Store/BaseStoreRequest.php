<?php

namespace App\Http\Requests\Store;

use App\Http\Requests\ApiRequest;

class BaseStoreRequest extends ApiRequest
{
    public function messages()
    {
        return [
            'required' => 'O campo ( :attribute ) não pode ser vazio',
            'unique' => ':attribute já utilizado',
            'categories.required' => 'Selecione pelo menos uma categoria'
        ];
    }

    public function customAttributes()
    {
        return [
            'name' => 'Nome',
            'description' => "Descrição"
        ];
    }
}
