<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\User\Profile;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');

Route::group(['middleware' => ['role:user|admin']], function () {
    Route::get('/profile', Profile::class)->name('user.profile');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin-dashboard', Dashboard::class)->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
