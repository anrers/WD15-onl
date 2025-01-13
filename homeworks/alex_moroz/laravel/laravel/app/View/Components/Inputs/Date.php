<?php

namespace App\View\Components\Inputs;

use App\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class Date extends BaseComponent
{
    public string $dateFormated;

    /**
     * Create a new component instance.
     */
    public function __construct(public Carbon $date)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->dateFormated = $this->date->format('Y-m-d');
        return view('components.inputs.date');
    }
}
