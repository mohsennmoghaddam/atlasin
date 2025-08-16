<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalCategoryCatalog extends Model
{
    protected $fillable = ['category_id','title','file','order','is_active'];

    protected $casts = [
        'title' => 'array',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(HospitalCategory::class);
    }
}
