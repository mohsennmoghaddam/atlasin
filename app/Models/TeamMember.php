<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'position',
        'email',
        'linkedin',
        'mobile',
        'internal_number',
        'image',
    ];

    public $translatable = ['name', 'position'];
}

