<?php
use Controllers\AppController;
use Diana\IO\Request;

return [
    '/' => function (Request $request) {
        return "router working";
    },

    '/home' => [AppController::class, 'home'],

    '/foo' => [
        '/bar' => [AppController::class, 'nested']
    ]
];