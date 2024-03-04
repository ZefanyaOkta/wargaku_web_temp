<?php

namespace App\View\Components\Roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class Permission extends Component
{
    public $permissions, $modalId, $role;
    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $rowId)
    {
        $this->modalId = $modalId;
        $this->permissions = ModelsPermission::all();
        $this->role = Role::find($rowId);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roles.permission');
    }
}
