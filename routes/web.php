<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\GymMemberController;
use App\Http\Controllers\admin\StaffController;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected admin routes
// Route::middleware(['auth'])->group(function () {
//     // Dashboard
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//     // Member routes
//     Route::prefix('admin/members')->group(function () {
//         Route::get('/', [GymMemberController::class, 'index'])->name('members.index');
//         Route::post('/store', [GymMemberController::class, 'store'])->name('members.store');
//         Route::get('/list', [GymMemberController::class, 'list'])->name('members.list');
//         Route::get('/update', [GymMemberController::class, 'updatemembers'])->name('members.update-list');
//         Route::get('/{id}/edit', [GymMemberController::class, 'edit'])->name('members.edit');
//         Route::put('/{id}', [GymMemberController::class, 'update'])->name('members.update');
//         Route::delete('/{id}', [GymMemberController::class, 'destroy'])->name('members.destroy');

//         Route::get('/status', [GymMemberController::class, 'showStatus'])->name('members.status');

//     });

//     // Equipment routes
//     Route::prefix('admin/equipment')->group(function () {
//         Route::get('/', [GymMemberController::class, 'equipmentIndex'])->name('equipment.index');
//         Route::post('/', [GymMemberController::class, 'equipmentStore'])->name('equipment.store');
//         Route::get('/list', [GymMemberController::class, 'equipmentList'])->name('equipment.list');
//         Route::get('/{id}/edit', [GymMemberController::class, 'equipmentEdit'])->name('equipment.edit');
//         Route::put('/{id}', [GymMemberController::class, 'equipmentUpdate'])->name('equipment.update');
//         Route::delete('/{id}', [GymMemberController::class, 'equipmentDestroy'])->name('equipment.destroy');
//     });

//     // Staff routes
//     Route::prefix('admin/staff')->group(function () {
//         Route::get('/', [StaffController::class, 'index'])->name('staff.index');
//         Route::get('/entry', [StaffController::class, 'showForm'])->name('staff.entry.form');
//         Route::post('/entry', [StaffController::class, 'submitForm'])->name('staff.entry.submit');
//         Route::get('/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
//         Route::put('/{staff}', [StaffController::class, 'update'])->name('staff.update');
//         Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
//     });
// });



// Protected admin route
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [adminController::class, 'dashboard'])->name('dashboard');

    // Members routes
    Route::get('/admin/members', [GymMemberController::class, 'index'])->name('members.index');
    Route::post('/admin/members/store', [GymMemberController::class, 'store'])->name('members.store');
    Route::get('/admin/members/list', [GymMemberController::class, 'list'])->name('members.list');
    Route::get('/admin/members/{id}/edit', [GymMemberController::class, 'edit'])->name('members.edit');
    Route::put('/admin/members/{id}', [GymMemberController::class, 'update'])->name('members.update');
    Route::get('/admin/memberupdate', [GymMemberController::class, 'updatemembers'])->name('members.update-details');
    Route::delete('/admin/members/{id}', [GymMemberController::class, 'destroy'])->name('members.destroy');
    Route::get('/admin/members/status', [GymMemberController::class, 'showStatus'])->name('members.status');

    //payment
    Route::get('/admin/members/payment', [GymMemberController::class, 'showPaymentList'])->name('members.paymentList');
    Route::get('/admin/members/{id}/payment', [GymMemberController::class, 'showPaymentForm'])->name('members.showPaymentForm');

    Route::get('/admin/members/{id}/payment', [GymMemberController::class, 'showPaymentForm'])->name('members.showPaymentForm');
    Route::post('/admin/members/{id}/payment', [GymMemberController::class, 'makePayment'])->name('members.makePayment');
    Route::put('/admin/members/{id}/payment', [GymMemberController::class, 'processPayment'])->name('members.processPayment');


    // Equipment routes
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

