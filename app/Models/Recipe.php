<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recipes";
    
    protected $fillable = [
        'recipe_name',
        'slug',
        'description',
        'recipe_image',
        'small_details',
        'avg_cooking_time',
        'ingredients',
        'procedures',
        'tools_needed',
        'is_active',
    ];

    // Mutators

    // public function setRecipeNameAttribute($value)
    // {
    //     // $this->attributes['recipe_name'] = Str::slug($value);
    //     $this->attributes['slug'] = strtolower($value);
    // }

    // Accessor
    public function getRecipeNameAttribute($value)
    {
        return ucfirst($this->attributes['recipe_name']);
    }

}
