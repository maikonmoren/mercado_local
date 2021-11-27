<?php

namespace App\Http\Requests\Merchant;

class UpdateMerchantRequest extends BaseMerchantRequest
{
    public function rules(){
        return [
            'name' => [
                'string',
            ],
            'email' => [
                'string'
            ],
            'document' => [
                'document',
                'string'
            ],
            'logo' => [
                'image',
            ],
            'password' => [
                'confirmed'
            ]
        ];
    }
}
