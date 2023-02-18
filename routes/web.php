<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostApproveController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UnderCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search/', [SearchController::class, 'index'])->name('search');

Route::get('/{category}/{title}', [HomeController::class, 'show'])->name('home.post');

Route::get('/posts/tag/{slug}', [TagController::class, 'show'])->name('tags.show');
Route::get('/posts/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/posts/{category}/{slug}', [UnderCategoryController::class, 'show'])->name('undercategory.show');


Route::get('/post/edit/{id}', [HomeController::class, 'edit'])->name('home.post.edit');
Route::put('/post/edit/{id}', [HomeController::class, 'update'])->name('home.post.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'logs-out-banned-user'])->name('dashboard');

Route::middleware(['auth', 'verified', 'admin'])->prefix('dashboard/approve')->group(function (){
    Route::get('/authors', [UserController::class, 'showToApprove'])->name('approve');
    Route::post('/approve/authors', [UserController::class, 'storeApprove'])->name('approve.store');

    Route::get('/posts', [PostApproveController::class, 'showToApprove'])->name('post.approve');
    Route::post('/posts', [PostApproveController::class, 'storeApprove'])->name('postApprove.store');
    Route::delete('/posts', [PostApproveController::class, 'drop'])->name('postApprove.drop');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('/dashboard/admin/category')->group(function (){
    Route::get('/', [DashboardController::class, 'category'])->name('category.index');
    Route::get('/all', [CategoryController::class, 'index'])->name('category.all');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('/dashboard/admin/tags')->group(function (){
    Route::get('/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/create', [TagController::class, 'store'])->name('tags.store');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('/dashboard/admin/users')->group(function (){
    Route::get('/create', [UserController::class, 'all'])->name('users.all');
    Route::post('/create', [UserController::class, 'ban'])->name('users.ban');
});

Route::resource('/dashboard/posts', PostController::class)->middleware(['auth', 'verified']);
require __DIR__.'/auth.php';
