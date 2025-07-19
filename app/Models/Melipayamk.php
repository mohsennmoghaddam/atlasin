<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Melipayamk extends Model
{
    use HasFactory;

    public function OTPSMS($code, $mobile , $text)
    {
//        $url = 'https://console.melipayamak.com/api/send/shared/b82f4433f6a942d9a7f3df7c6b74b050';
//        $data = array('bodyId' => 345028, 'to' => $mobile, 'args' => [$code]);
//        $data_string = json_encode($data);
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
//
//// Next line makes the request absolute insecure
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//// Use it when you have trouble installing local issuer certificate
//// See https://stackoverflow.com/a/31830614/1743997
//
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER,
//            array('Content-Type: application/json',
//                'Content-Length: ' . strlen($data_string))
//        );
//        $result = curl_exec($ch);
//        curl_close($ch);
//// to debug
//// if(curl_errno($ch)){
////     echo 'Curl error: ' . curl_error($ch);
//// }
        $url = 'https://console.melipayamak.com/api/send/simple/b82f4433f6a942d9a7f3df7c6b74b050';
        $data = array('from' => '50002710082478', 'to' => $mobile,  'text' => "کد ورود شما به پنل کاربری اطلسین: {$code}- لطفاً تا ۲ دقیقه دیگر وارد کنید.",);
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

// Next line makes the request absolute insecure
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Use it when you have trouble installing local issuer certificate
// See https://stackoverflow.com/a/31830614/1743997

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array('Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        curl_close($ch);
// to debug
// if(curl_errno($ch)){
//     echo 'Curl error: ' . curl_error($ch);
// }
    }


}
