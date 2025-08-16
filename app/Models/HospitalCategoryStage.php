<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalCategoryStage extends Model
{
    protected $fillable = ['category_id','title','body','image','order','is_active'];

    protected $casts = [
        'title' => 'array',
        'body'  => 'array',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(HospitalCategory::class);
    }
}
