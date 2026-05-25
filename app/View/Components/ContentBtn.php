<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentBtn extends Component
{
    /**
     * Create a new component instance.
     */
    public string $route;
    public string $value;
    public function __construct($route,$value)
    {
        //
        $this->route = $route;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content-btn');
    }
}
