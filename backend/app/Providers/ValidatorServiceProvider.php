<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Respect\Validation\Rules as RespectRules;

class ValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
       Validator::extend('document', function($attribute, $value, $parameters, $validator) {
            return (new RespectRules\OneOf(
            new RespectRules\Cnpj(),
            new RespectRules\Cpf()
            ))->validate($value);
        });
    }
}
