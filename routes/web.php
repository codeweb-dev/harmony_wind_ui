<?php

use App\Livewire\Admin\ComponentManager;
use App\Livewire\Admin\Dashboard;
use App\Livewire\User\Profile;
use App\Livewire\User\ShowComponent;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');

Route::group(['middleware' => ['role:user|admin']], function () {
    Route::get('/profile', Profile::class)->name('user.profile');
    Route::get('/components/{component}', ShowComponent::class)->name('user.components');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/components', ComponentManager::class)->name('admin.components');
});

require __DIR__ . '/auth.php';
