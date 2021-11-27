<?php

namespace App\Http\Requests\Store;

class CreateStoreRequest extends BaseStoreRequest
{
        public function rules()
        {
            return [
                'name' => [
                    'required',
                    'string'
                ],
                'description' => [
                    'required',
                    'string'
                ],
                'categories' => [
                    'array',
                    'required',
                ]
            ];
        }
}
