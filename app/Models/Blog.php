<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'short_description', 'content',
        'image', 'status', 'published_at', 'user_id'
    ];

    protected $casts = [
        'title' => 'array',
        'short_description' => 'array',
        'content' => 'array',
        'published_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_blog');
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
