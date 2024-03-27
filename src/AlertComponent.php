<?php

use Diana\Rendering\Component;
use Diana\Rendering\Renderer;

class AlertComponent extends Component
{
    public function __construct(private Renderer $renderer, public $type, public $message)
    {
    }

    public function render()
    {
        return $this->renderer->make(App::getPath() . "/res/alert.blade.php");
    }
}