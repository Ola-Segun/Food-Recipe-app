<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = "Posts";
    
    protected $fillable = [
        'user_id',
        'Post_name',
        'slug',
        'description',
        'tags',
        'Post_image',
        'post_summary',
        'post_body',
        'is_active',
    ];

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class, 'Post_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('Post_name', 'like', '%' . request('search') . '%')
                //   ->orWhere('description', 'like', '%' . request('search' . '%'))
                //   ->orWhere('tags', 'like', '%' . request('search') . '%')
                //   ->orWhere('post_summary', 'like', '%' . request('search') . '%')
                //   ->orWhere('post_body', 'like', '%' . request('search') . '%')
                  ;
        }
    }

    // Mutators

    // public function setPostNameAttribute($value)
    // {
    //     // $this->attributes['Post_name'] = Str::slug($value);
    //     $this->attributes['slug'] = strtolower($value);
    // }

    // Accessor
    public function getPostNameAttribute($value)
    {
        return ucfirst($this->attributes['Post_name']);
    }

    public function getTagsAttribute($value)
    {
        return ucfirst($this->attributes['tags']);
    }

}
