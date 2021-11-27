<?php

namespace App\Http\Requests\Merchant;

use App\Http\Requests\ApiRequest;

class BaseMerchantRequest extends ApiRequest
{
    public function messages()
    {
        return [
            'required' => 'O campo ( :attribute ) não pode ser vazio',
            'document' => 'Cnpj ou Cpf inválido',
            'unique' => ':attribute já utilizado',
            'confirmed' => 'Confirmação de senha inválida'
        ];
    }

    public function customAttributes()
    {
        return [
            'name' => 'Nome',
            'password' => 'Senha',
            'email' => 'E-mail',
            'document' => 'Cpf ou Cnpj'
        ];
    }
}
