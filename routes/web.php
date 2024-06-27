<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostImageContoller;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [PostController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}/view', [PostController::class, 'show']);


Route::middleware(['auth'])->group(function(){
    Route::get('/posts/{user_id}/myposts', [PostController::class, 'myPosts']);
    
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('/posts/create', [PostController::class, 'store']);
    Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{id}/edit', [PostController::class, 'update']);
    Route::get('/posts/{id}/delete', [PostController::class, 'destroy']);
    Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('post.comments.store');

});


// Admin
// routes/web.php

Route::middleware([AdminMiddleware::class])->group(function(){
    
    Route::post('tags/create', 'TagController@store')->name('tags.store');
    Route::get('/posts/admin', [AdminController::class, 'index']);
    Route::get('/posts/admin/tags', [AdminController::class, 'showTags']);
    Route::get('/posts/admin/posts', [AdminController::class, 'showPosts']);
    Route::get('/posts/admin/users', [AdminController::class, 'showUsers']);
    Route::get('/posts/admin/gallery', [AdminController::class, 'showGallery']);
    Route::get('/posts/admin/gallery/delete/{id}', [AdminController::class, 'imgDelete']);
    Route::post('/posts/admin/tags/create', [AdminController::class, 'tagStore']);
    Route::put('/posts/admin/tags/update/{id}', [AdminController::class, 'tagUpdate']);
    Route::get('/posts/admin/tags/delete/{id}', [AdminController::class, 'tagDelete']);

});

// Galleries
Route::get('/posts/gallery', [GalleryController::class, 'index']);
Route::get('posts/gallery/upload', [GalleryController::class, 'create']);
Route::post('posts/gallery/upload', [GalleryController::class, 'store']);
Route::get('posts/gallery/{id}/delete', [GalleryController::class, 'destroy']);


// Image Uploads
Route::get('/posts/{PostId}/upload', [PostImageContoller::class, 'index']);
Route::post('/posts/{PostId}/upload', [PostImageContoller::class, 'store']);
Route::get('/posts-image/{PostId}/delete', [PostImageContoller::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
