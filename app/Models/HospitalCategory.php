<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalCategory extends Model
{
    protected $fillable = ['slug','title','subtitle','icon','order'];
    protected $casts = [
        'title'    => 'array',
        'subtitle' => 'array',
    ];
}
