<?php

namespace App\Library;

class UddoktaPay {

    /**
     * Send payment request
     *
     * @param array $requestData
     * @return void
     */
    public static function init_payment($requestData) {

// $response = Http::withHeaders( [

//     'Content-Type'          => 'application/json',

//     'RT-UDDOKTAPAY-API-KEY' => env( "UDDOKTAPAY_API_KEY" ),

// ] )

//     ->asJson()

//     ->withBody( json_encode( $requestData ), "JSON" )

//     ->post( env( "UDDOKTAPAY_PAYMENT_DOMAIN" ) . "/api/checkout" );

// if ( $response->successful() ) {

//     $result=$response->json();

//     if($result['status']){

//         return $response->collect()['payment_url'];

//     }else{

//         throw new Exception($result['message']);

//     }

// }

        // throw new Exception("Please recheck env configurations");

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => "https://sandbox.uddoktapay.com/api/checkout",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_HTTPHEADER     => [
                "RT-UDDOKTAPAY-API-KEY: 982d381360a69d419689740d9f2e26ce36fb7a50",
                "accept: application/json",
                "content-type: application/json",
            ],
        ]);

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

    }

}
