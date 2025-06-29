<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'icon_image',
        'icon_title',
    ];

    protected $casts = [
        'icon_title' => 'array',
    ];


    public function about()
    {
        return $this->belongsTo(About::class);
    }

}


