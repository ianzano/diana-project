<?php
use Diana\Drivers\Interfaces\RoutingDriver;
use Diana\Drivers\RoutingManager;

return [
    'packages' => [
        SamplePackage::class
    ],
    'drivers' => [
        RoutingDriver::class => RoutingManager::class
        // ConfigDriver::class => ConfigDriverManager::class
    ]
];