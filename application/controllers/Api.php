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
    public function customer(){
        $name=$this->input->post('name');
        $data=$this->basedata->getCustomer($name);
        echo json_encode($data);
    }
    
    
}    