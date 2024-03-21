<?php

use Diana\Runtime\Kernel as KernelDriver;
use Diana\Contracts\Kernel;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Application;
use Diana\Runtime\Package;

class AppPackage extends Package
{
    /** This package is being initialized */
    /** Register Drivers, Packages, Controllers here */
    public function __construct(private Application $app)
    {
        $this->app->singleton(Kernel::class, KernelDriver::class);

        $this->app->registerPackage(RoutingPackage::class);
        $this->app->registerPackage(SamplePackage::class);
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