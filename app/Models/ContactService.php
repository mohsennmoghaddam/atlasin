<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactService extends Model
{
    use HasTranslations;

    protected $fillable = ['title'];
    public $translatable = ['title'];

    public function contacts()
    {
        return $this->hasMany(ContactUs::class);
    }
}
