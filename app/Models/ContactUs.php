<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'contact_service_id', 'message', 'status'];


    public function contactService()
    {
        return $this->belongsTo(ContactService::class);
    }
}
