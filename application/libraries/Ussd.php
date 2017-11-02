<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ussd
 *
 * @author admin
 */
class Ussd {

    function test(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8243",
            CURLOPT_URL => "http://10.162.16.31:8243/messaging/1.0.0/ussd/menu",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "=%7B%22request%22%20%3A%20%7B%20%22destination%22%20%3A%20%226287777920933%22%2C%0A%20%22menu%22%3A%22http%3A%2F%2F10.161.100.139%3A8080%2Fxlds%2Fumb%2Fhandler%2Fxlt%3FMENUID%3D364%26MSISDN%3D628778%0A2390265%26DESTINATION%3D6287777920933%26AMOUNT%3D500000%22%0A%20%7D%7D",
            CURLOPT_HTTPHEADER => array(
                "authorization: Basic dGVzdDp0ZXN0",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: c31a694c-4309-1802-5bb8-48e8038677c4"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    function send($url,$data,$token){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8243",
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "authorization: Basic dGVzdDp0ZXN0",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: c31a694c-4309-1802-5bb8-48e8038677c4"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    
}
