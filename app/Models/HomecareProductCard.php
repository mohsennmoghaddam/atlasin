<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomecareProductCard extends Model
{
    use HasFactory;
    protected $fillable = ['icon', 'title', 'description', 'slug'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

}
