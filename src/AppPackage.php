<?php
use Controllers\AppController;
use Diana\Interfaces\Runnable;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Package;

class AppPackage extends Package implements Runnable
{
    public function register()
    {
        $this->registerPackage(RoutingPackage::class);

        $this->registerController(AppController::class);
    }

    public function boot()
    {

    }
}