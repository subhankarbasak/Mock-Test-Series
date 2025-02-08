<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $user_id, $role_id;

    protected $guard_name = 'api';

    public function assignRole()
    {
        if (!auth()->user()->can('assign roles')) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::find($this->user_id);
        $role = Role::find($this->role_id);

        if ($user && $role) {
            $user->syncRoles($role);
            session()->flash('success', 'Role assigned successfully!');
        }
    }

    public function render()
    {
        // return view('livewire.admin.users');
        return view('livewire.admin.users', [
            'users' => User::all(),
            'roles' => Role::all()
        ])->layout('components.layouts.admin');
    }
}
