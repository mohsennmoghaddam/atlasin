<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomecareTextSection extends Model
{
    protected $fillable = ['key','title','body','order'];
    protected $casts = [
        'title' => 'array',
        'body'  => 'array',
    ];
}
