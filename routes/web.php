<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->middleware(['role:admin'])->group(function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'userListing'])->name('admin.user.listing');
        Route::get('/events', [AdminEventController::class, 'listing'])->name('admin.event.listing');
        Route::get('/bookings', [AdminBookingController::class, 'listing'])->name('admin.booking.listing');
    });

    Route::middleware(['role:user'])->group(function(){
        Route::get('/dashboard', [UserUserController::class, 'dashboard'])->name('dashboard');
        Route::post('/book-ticket', [UserBookingController::class, 'store'])->name('user.event.create');
        Route::get('/events', [UserEventController::class, 'listing'])->name('user.event.listing');
        Route::get('/bookings', [UserBookingController::class, 'listing'])->name('user.booking.listing');
    });

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
