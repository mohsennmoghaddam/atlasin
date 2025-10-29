<?php

namespace App\Support;

class TrackingCode
{
    public static function make(int $trainingId, int $seq = null): string
    {
        $base = $seq ? base_convert($seq, 10, 36) : substr(md5(uniqid()), 0, 6);
        $raw = "TRN-{$trainingId}-" . strtoupper($base);
        $check = strtoupper(substr(dechex(crc32($raw)), 0, 4));
        return "{$raw}-{$check}";
    }
}

