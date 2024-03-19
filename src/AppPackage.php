<?php
use Controllers\AppController;
use Diana\Interfaces\Runnable;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Application;
use Diana\Runtime\Package;
use Diana\Support\Debug;

class AppPackage extends Package implements Runnable
{
    public function register(Application $app)
    {
        $app->registerPackage(RoutingPackage::class);

        $app->registerController(AppController::class);
    }

    public function boot()
    {

    }
}