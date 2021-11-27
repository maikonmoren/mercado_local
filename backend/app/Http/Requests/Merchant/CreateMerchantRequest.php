<?php

namespace App\Http\Requests\Merchant;


class CreateMerchantRequest extends BaseMerchantRequest
{
    public function rules(){
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'unique:merchant_users'
            ],
            'document' => [
                'document',
                'required',
                'string',
                'unique:merchant_users'
            ],
            'logo' => [
                'image',
                'nullable'
            ],
            'password' => [
                'required',
                'confirmed',
                'string',
            ]
        ];
    }
}
