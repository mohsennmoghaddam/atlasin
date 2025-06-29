<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasTranslations;

    public $translatable = ['title', 'description', 'button', 'link'];

    public function scopeOrdered($query, $direction = 'asc')
    {
        return $query->orderBy('order', $direction);
    }
}
