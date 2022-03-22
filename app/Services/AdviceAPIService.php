<?php

namespace App\Services;

class AdviceAPIService {

    public function getCurl( $url )
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_FAILONERROR,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        $data = curl_exec($ch);          
        curl_close($ch);

        return $data;
    }

}