<?php

namespace App\View\Components\Roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;

class Add extends Component
{
    public $modalId, $permissions;


    /**
     * Create a new component instance.
     */
    public function __construct($modalId)
    {
        $this->modalId = $modalId;
        $this->permissions = Permission::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roles.add');
    }
}
