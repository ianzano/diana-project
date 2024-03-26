<?php

use Diana\Rendering\Component;
use Diana\Rendering\Renderer;

class AlertComponent extends Component
{
    // public $type;
    // public $message;

    public function __construct($type, $message)
    {
        // $this->type = $type;
        // $this->message = $message;
    }

    public function render()
    {
        return App::resolve(Renderer::class)->render(App::getPath() . "/res/alert.blade.php");
    }
}