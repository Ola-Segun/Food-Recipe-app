<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    use HasFactory;

    protected $table = 'recipe_images';

    protected $fillable = [
        'recipe_id',
        'recipe_images',
    ];
}
