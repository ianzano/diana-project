<?php

namespace Controllers;

use Diana\Routing\Attributes\Get;
use Diana\Routing\Attributes\Post;

class AppController
{
    static string $route = '/app';

    #[Get('/home')]
    #[Post('/test')]
    public function home()
    {
        return "controller working";
    }

    public function nested()
    {
        return "nested working";
    }
}