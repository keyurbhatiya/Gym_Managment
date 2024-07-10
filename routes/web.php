<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\GymMemberController;
use App\Http\Controllers\admin\StaffController;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');


// routes/web.php
Route::get('/', function () {
    return view('home');
});

// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected admin route
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [adminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/members', [GymMemberController::class, 'index'])->name('members.index');
    Route::post('/admin/members/store', [GymMemberController::class, 'store'])->name('members.store');
    Route::get('/admin/members/list', [GymMemberController::class, 'list'])->name('members.list');

    Route::get('/admin/memberupdate', [GymMemberController::class, 'updatemembers'])->name('m.update');

    // Edit member route
    Route::get('/admin/members/{id}/edit', [GymMemberController::class, 'edit'])->name('members.edit');

    // Update member route
    Route::put('/admin/members/{id}', [GymMemberController::class, 'update'])->name('members.update');

    // Delete member route
    Route::delete('/admin/members/{id}', [GymMemberController::class, 'destroy'])->name('members.destroy');

    //equipment

    Route::get('equipment', [GymMemberController::class, 'equipmentIndex'])->name('equipment.index');
    Route::post('equipment', [GymMemberController::class, 'equipmentStore'])->name('equipment.store');
    Route::get('equipment/list', [GymMemberController::class, 'equipmentList'])->name('equipment.list');
    Route::get('equipment/{id}/edit', [GymMemberController::class, 'equipmentEdit'])->name('equipment.edit');
    Route::put('equipment/{id}', [GymMemberController::class, 'equipmentUpdate'])->name('equipment.update');
    Route::delete('equipment/{id}', [GymMemberController::class, 'equipmentDestroy'])->name('equipment.destroy');

    // Staff routes
    Route::get('admin/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('admin/staff-entry', [StaffController::class, 'showForm'])->name('staff.entry.form');
    Route::post('/staff-entry', [StaffController::class, 'submitForm'])->name('staff.entry.submit');

    Route::get('/admin/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/admin/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');

    Route::delete('/admin/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');

});



// Route::get('admin/member-entry-form', [GymMemberController::class, 'store'])->name('store');


