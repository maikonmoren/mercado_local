<?php

use Client\CategoryController;

$router->get('/' , function(){
    return response()->json(['common']);
});

$router->get('categories' ,  CategoryController::class . "@list");
