<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [FrontendController::class, 'portfolioDetail'])->name('portfolio.detail');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/success-stories', [FrontendController::class, 'successStories'])->name('success-stories');
Route::get('/success-stories/{slug}', [FrontendController::class, 'successStoryDetail'])->name('success-stories.detail');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/category/{slug}', [FrontendController::class, 'blogByCategory'])->name('blog.category');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'storeContact'])->name('contact.store');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');

// Maintenance page
Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');
