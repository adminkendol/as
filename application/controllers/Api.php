<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('base/basedata'));
        $this->config->load('config', true);
        $this->server = $this->config->item('server_url');
    }
    public function client(){
        $name=$this->input->post('name');
        $data=$this->basedata->getClientApi($name);
        echo json_encode($data);
    }
    public function gettoken(){
        $url = 'https://intapi.dsmart.id:8243/token';
        $header=array(
            'Authorization'=>'Basic NU16U2VDZXJzMzRaNUljS1hyQ0JBb2FUWDdjYTpwYm9DTUo3RGFqU19ObzFNNmVnRXF1amN2U0Fh'
        );
        $response=exec("curl  -X POST 'https://intapi.dsmart.id:8243/token?grant_type=password&username=sinergibestama&password=s1n3rg!B3st4m41nd0n3s!4' -H 'Authorization:Basic NU16U2VDZXJzMzRaNUljS1hyQ0JBb2FUWDdjYTpwYm9DTUo3RGFqU19ObzFNNmVnRXF1amN2U0Fh'");
        $response= (array) json_decode($response);
        return $response['access_token'] ;
    }
    public function sendussd(){
        $dest=$this->input->post('phone');
        $umb_id=$this->input->post('umb_id');
        
        $post='{"request" : {"destination" : "'.$dest.'","menu" : "'.$umb_id.'"}}';
        $token=$this->gettoken();
        $response=exec("curl -X POST 'https://intapi.dsmart.id:8243/messaging/1.0.0/ussd/menu' -d '$post' -H 'Content-Type:application/json' -H 'Authorization:Bearer $token'");
        
        $response= (array) json_decode($response);
        print_r($response['response']->status) ;
    }
    
}    