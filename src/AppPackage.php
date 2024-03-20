<?php
use Controllers\AppController;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Application;
use Diana\Runtime\Package;
use Diana\Support\Debug;

class AppPackage extends Package
{
    public function __construct(private Application $app)
    {
        $this->app->registerPackage(RoutingPackage::class);
        $this->app->registerController(AppController::class);
    }

    public function boot()
    {

    }
}