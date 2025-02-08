<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class Authentication extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public $first_name;
    #[Validate('required|string|max:255')]
    public $last_name;
    #[Validate('required|date')]
    public $dob;
    #[Validate('required|in:male,female,other')]
    public $gender;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|digits:10|unique:users,phone')]
    public $phone;
    #[Validate('nullable|digits:10')]
    public $whatsapp;
    #[Validate('required|min:8|confirmed')]
    public $password;
    #[Validate('required')] 
    public $present_address;
    #[Validate('required')] 
    public $permanent_address;
    #[Validate('nullable|string|max:255')]
    public $father_name;
    #[Validate('nullable|image|max:1024')]
    public $image;

    public function register()
    {
        $validated = $this->validate();
        
        if ($this->image) {
            $imagePath = $this->image->store('user_images', 'public');
        }

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'password' => Hash::make($this->password),
            'present_address' => $this->present_address,
            'permanent_address' => $this->permanent_address,
            'father_name' => $this->father_name,
            'image' => $imagePath ?? null,
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
