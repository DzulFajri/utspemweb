<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\User\MyscheduleController;
use App\Http\Controllers\User\ProfilesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/dashboard', [UsersController::class, 'index'])->name('dashboard');
    Route::get('/myschedule', [MyscheduleController::class, 'index'])->name('myschedule');
    Route::get('/profile', [ProfilesController::class, 'edit'])->name('profile.edit');
});


Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/schedule', [ScheduleController::class, 'index'])->name('admin.schedule');
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('profile', [AdminController::class, 'index2'])->name('profile.edit');
});
