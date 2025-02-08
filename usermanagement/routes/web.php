<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\User\Dashboard;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Roles;
use App\Livewire\Admin\Users;
use App\Http\Controllers\Admin\UserManagementController;
use App\Livewire\Roles\RoleList;
use App\Livewire\Roles\RoleForm;
use App\Livewire\Users\UserForm;
use App\Livewire\Permissions\PermissionList;
use App\Livewire\Permissions\PermissionForm;






Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

// Dashboard
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', Dashboard::class)->name('dashboard');
// });

// Route::middleware(['auth', 'role:Admin'])->group(function () {
//     Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
//     Route::get('/admin/roles', Roles::class)->name('admin.roles');
//     Route::get('/admin/users', Users::class)->name('admin.users');
// });

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    // User Management Routes
    Route::resource('/admin/users', UserManagementController::class);
    
    // Role Management using Livewire
    Route::get('/admin/roles', RoleList::class)->name('roles.index');
    Route::get('/admin/roles/create', RoleForm::class)->name('roles.create');
    Route::get('/admin/roles/{roleId}/edit', RoleForm::class)->name('roles.edit');
    
    // Assign Roles to Users
    Route::get('/users/{id}/assign-role', UserForm::class)->name('users.assign-role');

    // Permission management
    Route::get('/admin/permissions', PermissionList::class)->name('permissions.index');
    Route::get('/admin/permissions/create', PermissionForm::class)->name('permissions.create');
    Route::get('/admin/permissions/edit/{id}', PermissionForm::class)->name('permissions.edit');
    
    Route::get('/admin/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});


// Logout
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    
    return redirect('/'); // Redirect to the homepage or any desired page after logout
})->name('logout')->middleware('auth');


// view code for logout
// <a href="{{ route('logout') }}" 
//    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
//     Logout
// </a>

