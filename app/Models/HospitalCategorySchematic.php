<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalCategorySchematic extends Model
{
    protected $fillable = ['category_id','image','order','is_active'];

    public function category()
    {
        return $this->belongsTo(HospitalCategory::class);
    }
}
