<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_image',
        'title',          // json
        'subtitle',       // json
        'final_paragraph', // json
        'experience_years',
        'experience_text_top',
        'experience_text_bottom',
        'call_us_image',
        'call_us_text',
    ];

    // مشخص می‌کنیم فیلدهای json رو باید cast کنه به آرایه
    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'final_paragraph' => 'array',
    ];

    // رابطه با آیکون‌ها
    public function about_icons()
    {
        return $this->hasMany(AboutIcon::class);
    }

    public function icons()
    {
        return $this->hasMany(AboutIcon::class);
    }

}
