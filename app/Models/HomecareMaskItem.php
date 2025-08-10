<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomecareMaskItem extends Model
{
    protected $fillable = ['category_id', 'image', 'order'];

    public function category()
    {
        return $this->belongsTo(HomecareMaskCategory::class, 'category_id');
    }
}
