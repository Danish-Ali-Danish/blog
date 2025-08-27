<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
    use App\Http\Controllers\FrontendController;

// ================= FRONTEND ==================
// routes/web.php

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendController::class, 'post'])->name('blog.post');
Route::get('/categories', [FrontendController::class, 'blogcategories'])->name('frontend.categories.index');

// ✅ Single category with posts
Route::get('/categories/{slug}', [FrontendController::class, 'blogcategory'])->name('frontend.categories.show');

Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// ================= ADMIN ==================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('comments', CommentController::class)->only(['index','destroy','update']);
    Route::resource('users', UserController::class)->only(['index','destroy']);
});
