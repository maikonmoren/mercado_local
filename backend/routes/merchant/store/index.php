<?php

use Merchant\StoreController;

$router->get('/' , StoreController::class . "@list" );
$router->post('/' , StoreController::class . "@create");

$router->group(['prefix' => '{store}'] , function() use($router) {

    $router->get('/' , StoreController::class . "@read");
    $router->patch('/' , StoreController::class . "@update");
    $router->delete('/' , StoreController::class . "@desactive");

});
