<?php
use Controllers\AppController;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Application;
use Diana\Runtime\Package;

class AppPackage extends Package
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