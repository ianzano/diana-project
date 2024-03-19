<?php

namespace Controllers;

use Diana\Routing\Attributes\Get;

class AppController
{
    static string $route = '/app';

    #[Get('/:tet')]
    public function home()
    {
        return "controller working";
    }
}