<?php

namespace App\Livewire\Auth;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;


class Register extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $dob, $gender, $email, $phone, $whatsapp_no, $password, $password_confirmation, $father_name;
    public $present_address, $present_city, $present_district, $present_state, $present_pincode;
    public $permanent_address, $permanent_city, $permanent_district, $permanent_state, $permanent_pincode;
    public $image;

    public $isSubmitting = false;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'dob' => 'nullable|date',
        'gender' => 'required|in:male,female,other',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|unique:users,phone',
        'whatsapp_no' => 'nullable|string',
        'password' => 'required|min:8|confirmed',
        'father_name' => 'nullable|string|max:255',
        'present_address' => 'nullable|string|max:255',
        'present_city' => 'nullable|string|max:255',
        'present_district' => 'nullable|string|max:255',
        'present_state' => 'nullable|string|max:255',
        'present_pincode' => 'nullable|string|max:10',
        'permanent_address' => 'nullable|string|max:255',
        'permanent_city' => 'nullable|string|max:255',
        'permanent_district' => 'nullable|string|max:255',
        'permanent_state' => 'nullable|string|max:255',
        'permanent_pincode' => 'nullable|string|max:10',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function register()
    {
        $this->isSubmitting = true;
        
        $this->validate();

        // Upload Image
        $imagePath = $this->image ? $this->image->store('profile_images', 'public') : null;

        $user = User::create([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'dob' => $this->dob,
                    'gender' => $this->gender,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'whatsapp_no' => $this->whatsapp_no,
                    'password' => Hash::make($this->password),
                    'father_name' => $this->father_name,
                    'present_address' => $this->present_address,
                    'present_city' => $this->present_city,
                    'present_district' => $this->present_district,
                    'present_state' => $this->present_state,
                    'present_pincode' => $this->present_pincode,
                    'permanent_address' => $this->permanent_address,
                    'permanent_city' => $this->permanent_city,
                    'permanent_district' => $this->permanent_district,
                    'permanent_state' => $this->permanent_state,
                    'permanent_pincode' => $this->permanent_pincode,
                    'image' => $imagePath,
                ]);

        // Assign default role
        $user->assignRole('user');
        
        $this->isSubmitting = false;
        session()->flash('success', 'Registration successful! You can now login.');
        return redirect()->route('login');
    }

    public function render()
    {
        // return view('livewire.auth.register');
        return view('livewire.auth.register')->layout('components.layouts.auth');
    }
}
