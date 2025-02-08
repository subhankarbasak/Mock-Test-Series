<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    public function render()
    {
        // return view('livewire.roles.role-list');
        return view('livewire.roles.role-list', [
            'roles' => Role::with('permissions')->get(),
        ])->layout('components.layouts.admin');
    }
}
