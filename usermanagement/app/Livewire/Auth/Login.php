<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->route('dashboard'); // Change this to your dashboard route
        }

        session()->flash('error', 'Invalid credentials. Please try again.');
    }

    public function render()
    {
        // return view('livewire.auth.login');
        return view('livewire.auth.login')->layout('components.layouts.auth');
    }
}
