<?php
use Controllers\AppController;
use Diana\Kernel\Driver;
use Diana\Kernel\Kernel;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Application;
use Diana\Runtime\Package;
use Diana\Support\Debug;

class AppPackage extends Package
{
    /** This package is being initialized */
    /** Register Drivers, Packages, Controllers here */
    public function __construct(private Application $app)
    {
        $this->app->singleton(Kernel::class, Driver::class);

        $this->app->registerPackage(SamplePackage::class);
        $this->app->registerPackage(RoutingPackage::class);

        $this->app->registerController(AppController::class);
    }

    /** All packages have been initialized */
    /** Register global middleware here */
    public function register(): void
    {

    }

    /** All packages have been registered */
    public function boot(): void
    {
    }
}