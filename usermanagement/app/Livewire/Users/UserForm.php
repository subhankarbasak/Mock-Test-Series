<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserForm extends Component
{
    public $userId, $roles = [], $selectedRoles = [];

    public function mount($id)
    {
        $this->userId = $id;
        $this->roles = Role::all();
        $user = User::find($this->userId);
        $this->selectedRoles = $user->roles->pluck('id')->toArray();
    }

    public function updateRoles()
    {
        $user = User::find($this->userId);
        $user->syncRoles($this->selectedRoles);
        session()->flash('success', 'Roles updated successfully.');
    }
    
    public function render()
    {
        return view('livewire.users.user-form');
    }
}
