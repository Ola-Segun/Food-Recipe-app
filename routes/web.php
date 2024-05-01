<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeImageContoller;

Route::get('/recipes', [RecipeController::class, 'index']);

// Galleries
Route::get('/recipes/gallery', [GalleryController::class, 'index']);
Route::get('recipes/gallery/upload', [GalleryController::class, 'create']);
Route::post('recipes/gallery/upload', [GalleryController::class, 'store']);
Route::get('recipes/gallery/{id}/delete', [GalleryController::class, 'destroy']);



Route::get('/recipes/create', [RecipeController::class, 'create']);
Route::post('/recipes/create', [RecipeController::class, 'store']);
Route::get('/recipes/{id}', [RecipeController::class, 'show']);
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit']);
Route::put('/recipes/{id}/edit', [RecipeController::class, 'update']);
Route::get('/recipes/{id}/delete', [RecipeController::class, 'destroy']);

// Image Uploads
Route::get('/recipes/{recipeId}/upload', [RecipeImageContoller::class, 'index']);
Route::post('/recipes/{recipeId}/upload', [RecipeImageContoller::class, 'store']);
Route::get('/recipes-image/{recipeId}/delete', [RecipeImageContoller::class, 'destroy']);





// Route::get('/recipes', function(){
//     return Recipe::get();
// });

// Route::get('/recipes-create', function(){
//     return Recipe::create([
//         'recipe_name' => 'seasoned plantain/dodo',
//         'slug' => 'seasoned-plantain',
//         'description' => 'seasoned plantain description',
//         'small_details' => 'seasoned plantain small des',
//         'avg_cooking_time' => '10 minutes',
//         'ingredients' => 'vegetable oil, fresh plantain, salt',
//         'procedures' => '1. put the oil on fire and allow to boil, 2. cut the plantain, 3. Add salt to the plantain, 4. put the plantain into the oil and allow to fry, 5. remove when it turns golden brown',
//         'tools_needed' => 'fire, frying pan, fork',
//     ]);
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
