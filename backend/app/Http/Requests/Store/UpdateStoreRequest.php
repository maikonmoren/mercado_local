<?php

namespace App\Http\Requests\Store;

class UpdateStoreRequest extends BaseStoreRequest
{
        public function rules()
        {
            return [
                'name' => [

                    'string'
                ],
                'description' => [

                    'string'
                ],
                'categories' => [
                    'array',
                ]
            ];
        }
}
