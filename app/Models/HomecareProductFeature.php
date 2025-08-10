<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomecareProductFeature extends Model
{
    protected $fillable = ['title','intro','image','model_title','specs','catalog','order'];
    protected $casts = [
        'title'       => 'array',
        'intro'       => 'array',
        'model_title' => 'array',
        'specs'       => 'array',
    ];
}
