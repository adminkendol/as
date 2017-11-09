<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Platform
 *
 * @author admin
 */
class Platform {
    function ussd($url,$param,$token,$port){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => $port,
            CURLOPT_URL => "$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $param,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
		"Authorization:Bearer ".$token
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    
    function token($url,$port,$header){
        $conKey=$header['conKey'];
        $conSec=$header['conSec'];
        $data=$conKey.":".$conSec;
        $basic=base64_encode($data);
        $user=$header['user'];
        $pass=$header['pass'];
        $param="grant_type=password&username=".$user."&password=".$pass;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_PORT => $port,
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $param,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
		"Authorization:Basic ".$basic
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    
}