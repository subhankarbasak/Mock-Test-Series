<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
    ];

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Password reset link sent to your email.');
        } else {
            session()->flash('error', 'Failed to send reset link. Try again.');
        }
    }

    public function render()
    {
        // return view('livewire.auth.forgot-password');
        return view('livewire.auth.forgot-password')->layout('components.layouts.auth');
    }
}
