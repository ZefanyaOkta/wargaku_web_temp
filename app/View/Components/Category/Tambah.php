<?php

namespace App\View\Components\Category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tambah extends Component
{
    public $modalId;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId)
    {
        $this->modalId = $modalId;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category.tambah');
    }
}
