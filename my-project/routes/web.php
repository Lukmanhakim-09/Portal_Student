<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    // If user is logged in and is admin, redirect to admin panel
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    // If user is logged in and is student, redirect to dashboard
    if (auth()->check() && auth()->user()->role === 'student') {
        return redirect()->route('dashboard');
    }
    
    // If not logged in, redirect to login
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/simulate-payment', [PaymentController::class, 'simulate'])->name('payment.simulate');

    // Notification routes
    Route::post('/notifications/{id}/mark-read', [DashboardController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/mark-all-read', [DashboardController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    
    // KRS routes
    Route::get('/krs', [KRSController::class, 'index'])->name('krs.index');
    Route::post('/krs/add-course', [KRSController::class, 'addCourse'])->name('krs.add-course');
    Route::delete('/krs/{id}/remove-course', [KRSController::class, 'removeCourse'])->name('krs.remove-course');
    Route::get('/krs/{id}/detail', [DashboardController::class, 'showDetail'])->name('krs.detail');
    Route::get('/krs/{id}/silabus', [DashboardController::class, 'showSilabus'])->name('krs.silabus');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';
