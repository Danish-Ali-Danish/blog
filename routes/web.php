<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;

// ================= FRONTEND ==================

// Public pages
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendController::class, 'post'])->name('blog.post');
Route::get('/categories', [FrontendController::class, 'blogcategories'])->name('frontend.categories.index');
Route::get('/categories/{slug}', [FrontendController::class, 'blogcategory'])->name('frontend.categories.show');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// ================= AUTH ==================

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated users can logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ================= DASHBOARDS ==================

// Admin dashboard & resources
Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('comments', CommentController::class)->only(['index','destroy','update']);
    Route::resource('users', UserController::class)->only(['index','destroy']);
});

// User dashboard (normal users)
Route::middleware(['auth','role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'userDashboard'])->name('dashboard');
});
