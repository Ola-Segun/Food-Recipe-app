<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $table = 'Post_images';

    protected $fillable = [
        'Post_id',
        'Post_images',
    ];
}
