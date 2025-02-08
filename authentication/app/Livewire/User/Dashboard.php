<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Dashboard extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $dob, $gender, $email, $phone, $whatsapp, $father_name;
    public $present_address, $present_city, $present_district, $present_state, $present_pincode;
    public $permanent_address, $permanent_city, $permanent_district, $permanent_state, $permanent_pincode;
    public $profile_image, $new_profile_image;

    public function mount()
    {
        $user = Auth::user();
        $this->fill($user->only([
            'first_name', 'last_name', 'dob', 'gender', 'email', 'phone', 'whatsapp', 'father_name',
            'present_address', 'present_city', 'present_district', 'present_state', 'present_pincode',
            'permanent_address', 'permanent_city', 'permanent_district', 'permanent_state', 'permanent_pincode'
        ]));
        $this->profile_image = $user->profile_image;
    }

    public function updateProfile()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'father_name' => 'nullable|string|max:255',
            'present_address' => 'required|string',
            'present_city' => 'required|string',
            'present_district' => 'required|string',
            'present_state' => 'required|string',
            'present_pincode' => 'required|string|max:10',
            'permanent_address' => 'required|string',
            'permanent_city' => 'required|string',
            'permanent_district' => 'required|string',
            'permanent_state' => 'required|string',
            'permanent_pincode' => 'required|string|max:10',
        ]);

        $user = Auth::user();
        $user->update($this->all());

        session()->flash('success', 'Profile updated successfully!');
    }

    public function updatedNewProfileImage()
    {
        $this->validate(['new_profile_image' => 'image|max:1024']); // 1MB Max
    }

    public function saveProfileImage()
    {
        if ($this->new_profile_image) {
            $user = Auth::user();

            // Delete old image if exists
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            // Store new image
            $path = $this->new_profile_image->store('profile_images', 'public');
            $user->update(['profile_image' => $path]);

            $this->profile_image = $path;
            session()->flash('success', 'Profile image updated successfully!');
        }
    }

    public function render()
    {
        // return view('livewire.user.dashboard');
        return view('livewire.user.dashboard')->layout('components.layouts.admin');
    }
}
