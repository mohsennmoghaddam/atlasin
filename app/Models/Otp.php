<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp_code',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
        'created_at',
        'updated_at',
    ];

    // رابطه با مدل User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * بررسی معتبر بودن OTP
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->expires_at && $this->expires_at->isFuture();
    }

    /**
     * حذف OTP های منقضی شده
     */
    public static function deleteExpired()
    {
        self::where('expires_at', '<', Carbon::now())->delete();
    }
}
