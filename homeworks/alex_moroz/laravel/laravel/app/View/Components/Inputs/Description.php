<?php

namespace App\View\Components\Inputs;

use App\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Description extends BaseComponent
{

    /**
     * Create a new component instance.
     */
    public function __construct(public string $description)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.description');
    }
}
