<?php

namespace App\Http\Requests\Merchant;

class LoginMerchantRequest extends BaseMerchantRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'string'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
