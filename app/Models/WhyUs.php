<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $fillable = ['title', 'description', 'image'];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];


    public function items()
    {
        return $this->hasMany(WhyUsItem::class);
    }


}
