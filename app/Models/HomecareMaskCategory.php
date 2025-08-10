<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomecareMaskCategory extends Model
{
    protected $fillable = ['title', 'order'];
    protected $casts = ['title' => 'array'];

    public function items()
    {
        return $this->hasMany(HomecareMaskItem::class, 'category_id')->orderBy('order');
    }
}

