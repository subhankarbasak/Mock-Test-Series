<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class Dashboard extends Component
{
    public function render()
    {
        // return view('livewire.admin.dashboard');
        return view('livewire.admin.dashboard')->layout('layouts.admin');
    }
}
