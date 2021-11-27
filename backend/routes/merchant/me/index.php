<?php

use Merchant\MerchantController;

$router->get('/' , MerchantController::class . "@me");

$router->patch('/' , MerchantController::class . "@update");


