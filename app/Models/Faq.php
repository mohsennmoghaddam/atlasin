<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['category_id','question','answer','order','is_active'];

    protected $casts = [
        'question' => 'array',
        'answer'   => 'array',
        'is_active'=> 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\HospitalCategory::class);
    }
}
