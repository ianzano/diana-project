<?php

use Diana\Runtime\Kernel;
use Diana\Routing\RoutingPackage;
use Diana\Runtime\Application;
use Diana\Runtime\Package;

class AppPackage extends Package
{
    // TODO: Make configuration file, any configs must be loaded before the packages

    /** This package is being initialized */
    /** Register Drivers, Packages, Controllers here */
    public function __construct(private Application $app)
    {
        $this->app->singleton('kernel', Kernel::class);

        $this->app->registerPackage(RoutingPackage::class);
        $this->app->registerPackage(SamplePackage::class);
    }

    /** All packages have been initialized */
    /** Register global middleware here */
    public function register(Kernel $kernel): void
    {

    }

    /** All packages have been registered */
    public function boot(): void
    {
    }
}