<?php
use Controllers\AppController;
use Diana\Routing\RoutingDriver;
use Diana\Routing\RoutingInterface;
use Diana\Routing\RoutingManager;

return [
    'packages' => [
        SamplePackage::class
    ],
    'controllers' => [
        AppController::class
    ],
    'drivers' => [
        RoutingInterface::class => RoutingDriver::class
        // ConfigDriver::class => ConfigDriverManager::class
    ]
];