<?php

use App\Controller\RegistrationController;

global $container, $router;

$container->add(RegistrationController::class)->addArgument('template_engine');
$router->get('/', [RegistrationController::class, 'index']);
