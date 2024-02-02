<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

if (!function_exists('sendMessage')) {
    function sendMessage($phone, $message) {
        $curl = curl_init();
        $token = env('WA_API_TOKEN');
        $data = [
            'phone' => $phone,
            'message' => $message,
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, env('WA_API_URL'));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}

if (!function_exists('formatPhoneNumberForWhatsApp')) {
    function formatPhoneNumberForWhatsApp($phoneNumber) {
        // Check if the phone number starts with '0'
        if (substr($phoneNumber, 0, 1) === '0') {
            // Remove the leading '0' and add the country code prefix
            $formattedNumber = '62' . substr($phoneNumber, 1);
        } else {
            // If the number doesn't start with '0', assume it's already in the correct format
            $formattedNumber = $phoneNumber;
        }
    
        return $formattedNumber;
    }
}