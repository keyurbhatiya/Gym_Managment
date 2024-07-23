<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GymMemberController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\EquipmentController;

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

//forget passowrd
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



// // Home route
// Route::get('/', function () {
//     return view('home');
// })->name('home')->middleware('redirect.if.authenticated');

// // Authentication routes
// Route::middleware('redirect.if.authenticated')->group(function () {
//     Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('register', [RegisterController::class, 'register']);
//     Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [LoginController::class, 'login']);
// });

// Protected admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Members routes
    Route::prefix('admin/members')->group(function () {
        Route::get('/', [GymMemberController::class, 'index'])->name('members.index');
        Route::post('/store', [GymMemberController::class, 'store'])->name('members.store');
        Route::get('/list', [GymMemberController::class, 'list'])->name('members.list');
        Route::get('/{id}/edit', [GymMemberController::class, 'edit'])->name('members.edit');
        Route::put('/{id}', [GymMemberController::class, 'update'])->name('members.update');
        Route::get('/memberupdate', [GymMemberController::class, 'updatemembers'])->name('members.update-details');
        Route::get('/status', [GymMemberController::class, 'showStatus'])->name('members.status');
        Route::delete('/{id}', [GymMemberController::class, 'destroy'])->name('members.destroy');

        //Payment
        Route::get('/{id}/payment', [PaymentController::class, 'showPaymentForm'])->name('members.showPaymentForm');
        Route::post('/{id}/payment', [PaymentController::class, 'makePayment'])->name('members.makePayment');
        Route::put('/{id}/payment', [PaymentController::class, 'processPayment'])->name('members.processPayment');
        Route::get('/payment', [PaymentController::class, 'showPaymentList'])->name('members.paymentList');
    });

    // Equipment routes
    Route::prefix('equipment')->group(function () {
        Route::get('/', [EquipmentController::class, 'equipmentIndex'])->name('equipment.index');
        Route::post('/', [EquipmentController::class, 'equipmentStore'])->name('equipment.store');
        Route::get('/list', [EquipmentController::class, 'equipmentList'])->name('equipment.list');
        Route::get('/{id}/edit', [EquipmentController::class, 'equipmentEdit'])->name('equipment.edit');
        Route::put('/{id}', [EquipmentController::class, 'equipmentUpdate'])->name('equipment.update');
        Route::delete('/{id}', [EquipmentController::class, 'equipmentDestroy'])->name('equipment.destroy');
    });

    // Staff routes
    Route::prefix('admin/staff')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('staff.index');
        Route::get('/entry', [StaffController::class, 'showForm'])->name('staff.entry.form');
        Route::post('/entry', [StaffController::class, 'submitForm'])->name('staff.entry.submit');
        Route::get('/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
        Route::put('/{staff}', [StaffController::class, 'update'])->name('staff.update');
        Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
    });

    // Attendance routes
    Route::prefix('attendance')->group(function () {
        Route::get('/list', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('/show', [AttendanceController::class, 'show'])->name('attendance.show');
        Route::get('/check-in/{id}', [AttendanceController::class, 'checkIn'])->name('attendance.checkIn');
        Route::get('/check-out/{id}', [AttendanceController::class, 'checkOut'])->name('attendance.checkOut');
        //check in
        Route::post('/check-all', [AttendanceController::class, 'checkAll'])->name('attendance.checkAll');
    });

    // routes/web.php
    Route::get('/admin/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
    Route::get('/admin/change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.change-password');
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change-password.update');


    // Route to display the reports
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');


    // Route::get('/trainers', [StaffController::class, 'showTrainers'])->name('trainers.index');
});



