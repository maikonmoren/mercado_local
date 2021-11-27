<?php

use Merchant\MerchantController;
use Merchant\AuthMerchantController;

$router->post('register' , MerchantController::class . "@create");

$router->post('login' , AuthMerchantController::class . "@login");


$router->group([ 'middleware' => 'auth:merchant' ], function() use ( $router ){

    $router->group(['prefix' => 'me' ] , function() use ($router){
        require_once __DIR__ . "/me/index.php" ;
    });

    $router->group(['prefix' => 'store' ] , function() use ($router){
        require_once __DIR__ . "/store/index.php" ;
    });

});
