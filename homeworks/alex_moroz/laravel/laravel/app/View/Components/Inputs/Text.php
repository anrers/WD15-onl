<?php

namespace App\View\Components\Inputs;

use App\View\Components\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

class Text extends BaseComponent
{
    public string $textFormated;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $text)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->textFormated = mb_ucfirst($this->text);
        return view('components.inputs.text');
    }
}
