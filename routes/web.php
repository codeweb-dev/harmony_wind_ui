<?php

use App\Livewire\Admin\BlogManager;
use App\Livewire\Admin\ComponentManager;
use App\Livewire\Admin\Dashboard;
use App\Livewire\User\Blog;
use App\Livewire\User\Profile;
use App\Livewire\User\ShowBlog;
use App\Livewire\User\ShowComponent;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');

Route::group(['middleware' => ['role:user|admin']], function () {
    Route::get('/profile', Profile::class)->name('user.profile');
    Route::get('/components/{component}', ShowComponent::class)->name('user.components');
    Route::get('/blog', Blog::class)->name('user.blog');
    Route::get('/blog/{blog}', ShowBlog::class)->name('show.blog');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/components', ComponentManager::class)->name('admin.components');
    Route::get('/admin/blog', BlogManager::class)->name('admin.blog');
});

require __DIR__ . '/auth.php';
