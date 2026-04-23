<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SuccessStoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/maintenance', [DashboardController::class, 'maintenance'])->name('admin.maintenance');
    Route::post('/maintenance', [DashboardController::class, 'updateMaintenance'])->name('admin.maintenance.update');

    // Skills
    Route::resource('skills', SkillController::class, ['as' => 'admin']);

    // Projects
    Route::resource('projects', ProjectController::class, ['as' => 'admin']);

    // Services
    Route::resource('services', ServiceController::class, ['as' => 'admin']);

    // Blog
    Route::resource('blog', BlogController::class, ['as' => 'admin']);
    Route::resource('blog-categories', BlogController::class, ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'], 'as' => 'admin'])
        ->parameters(['blog-categories' => 'blogCategory']);
    Route::get('blog-categories', [BlogController::class, 'categories'])->name('admin.blog-categories.index');
    Route::get('blog-categories/create', [BlogController::class, 'createCategory'])->name('admin.blog-categories.create');
    Route::post('blog-categories', [BlogController::class, 'storeCategory'])->name('admin.blog-categories.store');
    Route::get('blog-categories/{blogCategory}/edit', [BlogController::class, 'editCategory'])->name('admin.blog-categories.edit');
    Route::put('blog-categories/{blogCategory}', [BlogController::class, 'updateCategory'])->name('admin.blog-categories.update');
    Route::delete('blog-categories/{blogCategory}', [BlogController::class, 'destroyCategory'])->name('admin.blog-categories.destroy');

    // Contact Messages
    Route::resource('contact', ContactController::class, ['as' => 'admin', 'only' => ['index', 'show', 'destroy']]);
    Route::post('contact/{contactMessage}/archive', [ContactController::class, 'archive'])->name('admin.contact.archive');
    Route::post('contact/bulk-delete', [ContactController::class, 'bulkDelete'])->name('admin.contact.bulk-delete');

    // Gallery
    Route::resource('gallery', GalleryController::class, ['as' => 'admin']);

    // Success Stories
    Route::resource('success-stories', SuccessStoryController::class, ['as' => 'admin']);

    // Certifications
    Route::resource('certifications', CertificationController::class, ['as' => 'admin']);

    // Counters
    Route::get('counters', [CounterController::class, 'index'])->name('admin.counters.index');
    Route::post('counters', [CounterController::class, 'update'])->name('admin.counters.update');
});

// Auth Routes (Laravel Breeze/Fortify)
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', function () {
        return view('auth.profile');
    })->name('profile');
});
