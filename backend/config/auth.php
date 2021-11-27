<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'client' => [
            'driver' => 'jwt',
            'provider' => 'user',
        ],
        'merchant' => [
            'driver' => 'jwt',
            'provider' => 'merchant',
        ],
        'admin' => [
            'driver' => 'jwt',
            'provider' => 'admin',
        ],
    ],

    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class
        ],
        'merchant' => [
            'driver' => 'eloquent',
            'model' => \App\Models\MerchantUser::class
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => \App\Models\AdminUser::class
        ]
    ]

];
