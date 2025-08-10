<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomecareSection extends Model
{
    protected $fillable = ['key', 'title', 'body'];

    protected $casts = [
        'title' => 'array',
        'body' => 'array',
    ];
}
