<?php  

class Core extends Main_Controller {
 
    function __construct(){
        parent::__construct();
	//$this->load->library('platform');
        $this->load->library('curl');
    }
    function index(){	
        $this->dashboard();
    }
    
    /*--------------clients-----------------------------*/
    public function clients(){
        $this->data['headtitle']="Clients";
        $this->data['menu_id']="13";
        $id="all";
        $this->settings['base_url'] = site_url('core/clients');
        $this->settings['total_rows'] = $this->basedata->count_cust();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['customer']=$this->basedata->getCust($id,$this->settings["per_page"], $this->data['page']);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/clients/clients',$this->data);
    }
    public function addclient(){
        $this->data['headtitle']="Clients";
        $this->data['menu_id']="13";
        $this->data['rec']=array();
        $id="all";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/clients/form',$this->data);
    }
    public function saveclient(){
        $post=$this->input->post();
        $this->data['headtitle']="Clients";
        $this->data['menu_id']="13";
        $this->data['rec']=array();
        $id="all";
        $this->form_validation->set_rules('client_name', 'Client Name', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/clients/form',$this->data);
        }else{
            $this->basedata->setClient($post);
            redirect('core/clients', 'refresh');
        }
    }
    public function editclient(){
        $batas="";
        $offset="";
        $rec=$this->basedata->getCust($this->record,$batas,$offset);
        $this->data['headtitle']="Clients";
        $this->data['menu_id']="13";
        $this->data['rec']=$rec;
        $id="all";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/clients/form',$this->data);
    }
    public function remclient(){
        $this->basedata->delClient($this->record);
        redirect('core/clients', 'refresh');
    }
    /*--------------end clients-----------------------------*/
    
    /*--------------user-----------------------------*/
    public function user(){
        $this->data['headtitle']="User";
        $this->data['menu_id']="14";
        $this->data['parent']="9";
        $id="all";
        $this->data['user']=$this->basedata->getUser($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/user/user',$this->data);
    }
    public function adduser(){
        $this->data['headtitle']="User";
        $this->data['menu_id']="14";
        $this->data['rec']=array();
        $this->data['role']=$this->basedata->getRole();
        $this->tempe->load($this->theme.'/modul',$this->theme.'/user/form',$this->data);
    }
    public function saveuser(){
        $post=$this->input->post();
        $this->data['headtitle']="User";
        $this->data['menu_id']="14";
        $this->data['rec']=array();
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->data['role']=$this->basedata->getRole();
            $this->tempe->load($this->theme.'/modul',$this->theme.'/user/form',$this->data);
        }else{
            $this->basedata->setUser($post);
            redirect('core/user', 'refresh');
        }
    }
    public function edituser(){
        $rec=$this->basedata->getUser($this->record);
        $this->data['headtitle']="User";
        $this->data['menu_id']="14";
        $this->data['rec']=$rec;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/user/form',$this->data);
    }
    public function remuser(){
        $this->basedata->delUser($this->record);
        redirect('core/user', 'refresh');
    }
    /*--------------end user-----------------------------*/
    
    /*--------------type-----------------------------*/
    public function type(){
        $this->data['headtitle']="Ads Type";
        $this->data['menu_id']="23";
        $this->data['parent']="9";
        $id="all";
        $this->data['type']=$this->basedata->getType($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/type/type',$this->data);
    }
    public function addtype(){
        $this->data['headtitle']="Ads Type";
        $this->data['menu_id']="23";
        $this->data['rec']=array();
        $id="all";
        $this->data['vendor']=$this->basedata->getVendor($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/type/form',$this->data);
    }
    public function edittype(){
        $rec=$this->basedata->getType($this->record);
        $this->data['headtitle']="Ads Type";
        $this->data['menu_id']="23";
        $this->data['rec']=$rec;
        $id="all";
        $this->data['vendor']=$this->basedata->getVendor($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/type/form',$this->data);
    }
    public function savetype(){
        $post=$this->input->post();
        $this->data['headtitle']="Ads Type";
        $this->data['menu_id']="23";
        $this->data['rec']=array();
        $this->form_validation->set_rules('type_name', 'Type Name', 'required');
        $this->form_validation->set_rules('vendor_id', 'vendor', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/type/form',$this->data);
        }else{
            $this->basedata->settype($post);
            redirect('core/type', 'refresh');
        }
    }
    public function remtype(){
        $this->basedata->delType($this->record);
        redirect('core/type', 'refresh');
    }
    /*--------------end type-----------------------------*/
    
    /*--------------vendor-----------------------------*/
    public function vendor(){
        $this->data['headtitle']="Vendor";
        $this->data['menu_id']="25";
        $this->data['parent']="9";
        $id="all";
        $this->data['vendor']=$this->basedata->getVendor($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/vendor/vendor',$this->data);
    }
    public function addvendor(){
        $this->data['headtitle']="Vendor";
        $this->data['menu_id']="25";
        $this->data['rec']=array();
        $id="all";
        $this->data['vendor']=$this->basedata->getVendor($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/vendor/form',$this->data);
    }
    public function editvendor(){
        $rec=$this->basedata->getVendor($this->record);
        $this->data['headtitle']="Vendor";
        $this->data['menu_id']="25";
        $this->data['rec']=$rec;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/vendor/form',$this->data);
    }
    public function savevendor(){
        $post=$this->input->post();
        $this->data['headtitle']="Vendor";
        $this->data['menu_id']="25";
        $this->data['rec']=array();
        $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/vendor/form',$this->data);
        }else{
            $this->basedata->setvendor($post);
            redirect('core/vendor', 'refresh');
        }
    }
    public function remvendor(){
        $this->basedata->delVendor($this->record);
        redirect('core/vendor', 'refresh');
    }
    /*--------------end vendor-----------------------------*/
    
    /*--------------size-----------------------------*/
    public function size(){
        $this->data['headtitle']="Ads Size";
        $this->data['menu_id']="24";
        $this->data['parent']="9";
        $id="all";
        $this->data['size']=$this->basedata->getSize($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/size/size',$this->data);
    }
    public function addsize(){
        $this->data['headtitle']="Vendor";
        $this->data['menu_id']="24";
        $this->data['rec']=array();
        $id="all";
        $this->data['size']=$this->basedata->getSize($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/size/form',$this->data);
    }
    public function editsize(){
        $rec=$this->basedata->getSize($this->record);
        $this->data['headtitle']="Ads Size";
        $this->data['menu_id']="24";
        $this->data['rec']=$rec;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/size/form',$this->data);
    }
    public function savesize(){
        $post=$this->input->post();
        $this->data['headtitle']="Ads Size";
        $this->data['menu_id']="24";
        $this->data['rec']=array();
        $this->form_validation->set_rules('size_name', 'Size Name', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/size/form',$this->data);
        }else{
            $this->basedata->setsize($post);
            redirect('core/size', 'refresh');
        }
    }
    public function remsize(){
        $this->basedata->delSize($this->record);
        redirect('core/size', 'refresh');
    }
    /*--------------end size-----------------------------*/
    
    /*--------------content-----------------------------*/
    public function content(){
        $this->data['headtitle']="Ads Content";
        $this->data['menu_id']="21";
        $this->data['parent']="";
        $id="all";
        $this->data['content']=$this->basedata->getCont($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/content/content',$this->data);
    }
    public function addcontent(){
        $this->data['headtitle']="Ads Content";
        $this->data['menu_id']="21";
        $this->data['rec']=array();
        $id="all";
        $this->data['size']=$this->basedata->getSize($id);
        $this->data['type']=$this->basedata->getType($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/content/form',$this->data);
    }
    public function editcontent(){
        $rec=$this->basedata->getCont($this->record);
        $this->data['headtitle']="Ads Content";
        $this->data['menu_id']="21";
        $this->data['rec']=$rec;
        $id="all";
        $this->data['size']=$this->basedata->getSize($id);
        $this->data['type']=$this->basedata->getType($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/content/form',$this->data);
    }
    public function savecontent(){
        $post=$this->input->post();
        $this->data['headtitle']="Ads Content";
        $this->data['menu_id']="21";
        $this->data['rec']=array();
        $this->form_validation->set_rules('content_name', 'Content Name', 'required');
        $this->form_validation->set_rules('type_id', 'Type', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $id="all";
        $this->data['size']=$this->basedata->getSize($id);
        $this->data['type']=$this->basedata->getType($id);
        
        if($this->input->post('type_id')=="1"){
            $this->form_validation->set_rules('size_id', 'Size', 'required');
            $this->form_validation->set_rules('title1', 'Title 1', 'required');
            $this->form_validation->set_rules('title2', 'Title 2', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
        }
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/content/form',$this->data);
        }else{
            $this->basedata->setsize($post);
            redirect('core/content', 'refresh');
        }
    }
    public function remcontent(){
        $this->basedata->delContent($this->record);
        redirect('core/content', 'refresh');
    }
    /*--------------end content-----------------------------*/
    
    /*--------------platform-----------------------------*/
    public function ussd(){
        $this->data['headtitle']="USSD";
        $this->data['menu_id']="17";
        $this->data['parent']="";
        $this->data['umb']=$this->basedata->getRbt();
        $this->tempe->load($this->theme.'/modul',$this->theme.'/platform/form',$this->data);
    }
    public function ussdcamp(){
        $this->data['headtitle']="USSD";
        $this->data['menu_id']="17";
        $this->data['parent']="";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/platform/form_camp',$this->data);
    }
    public function sendussd(){
        $post=$this->input->post();
        $dest=$this->input->post('phone');
        $umb_id=$this->input->post('umb_id');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('umb_id', 'UMB', 'required');
        
        //print_r($response);
        
        if ($this->form_validation->run() == FALSE){
            $this->data['headtitle']="USSD";
            $this->data['menu_id']="17";
            $this->data['parent']="";
            $this->data['umb']=$this->basedata->getRbt();
            $this->tempe->load($this->theme.'/modul',$this->theme.'/platform/form',$this->data);
        }else{
            $post='{"request" : {"destination" : "'.$dest.'","menu" : "'.$umb_id.'"}}';
            $token=$this->gettoken();
            $response=exec("curl -X POST 'https://intapi.dsmart.id:8243/messaging/1.0.0/ussd/menu' -d '$post' -H 'Content-Type:application/json' -H 'Authorization:Bearer $token'");
            //print_r($response);die;
            $response= (array) json_decode($response);
            //print_r($response['response']['status']);die;
            redirect('core/ussd', 'refresh');
        }
    }
    public function sendussdcamp(){
        $config['upload_path'] = FCPATH.'temp/';
        $config['allowed_types'] = 'xls';
        $config['max_size'] = '10000';
        $this->load->library('upload', $config);
        $this->upload->do_upload('filephone');	
        
        $upload_data = $this->upload->data();
        $this->load->library('Excel_reader');
        //$this->excel_reader->setOutputEncoding('230787');
        $file = $upload_data['full_path'];
        exec('chmod 777 -R '.$file);
        $this->excel_reader->read($file);
        error_reporting(E_ALL ^ E_NOTICE);
        
        $data = $this->excel_reader->sheets[0];
        unlink($file);
        //print_r($upload_data);die;
        //print_r(json_encode($data['cells']));die;
        $link=$this->input->post('link');
        $suc=0;
        $fail=0;
        for($i=2;sizeof($data['cells']<$i);$i++){
            //print_r ($data['cells'][$i][2]."<br>");
            if($data['cells'][$i][2]==""){
                break;
            }
            //$response=$this->exeussd($data['cells'][$i][2],$link);
            $response=$this->exeussdstag($data['cells'][$i][2],$link);
            //$response="success";
            $post['type']='1';
            $post['msisdn']=$data['cells'][$i][2];
            $post['content']=$link;
            $post['push_date']=date('Y-m-d H:i:s');
            $post['status']=$response;
            $post['file']=$upload_data['file_name'];
            $this->basedata->setTransac($post);
            if($response=="success"){
                $suc++;
            }else{
                $fail++;
            }
        }
        $this->session->set_userdata('success', $suc);
        $this->session->set_userdata('fail', $fail);
        redirect('core/ussdcamp', 'refresh');
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
    public function exeussd($dest,$umb_id){
        $post='{"request" : {"destination" : "'.$dest.'","menu" : "'.$umb_id.'"}}';
        $token=$this->gettoken();
        $response=exec("curl -X POST 'https://intapi.dsmart.id:8243/messaging/1.0.0/ussd/menu' -d '$post' -H 'Content-Type:application/json' -H 'Authorization:Bearer $token'");
        //print_r($post."|".$response);die;
        $response= (array) json_decode($response);
        return $response['response']['status'];
    }
    public function exeussdstag($dest,$umb_id){
        $response=exec("curl -X POST  http://117.54.3.24:1282/api/sendussd/  -d phone='$dest'  -d 'umb_id=$umb_id'");
        return $response;
    }
    /*--------------end platform-----------------------------*/
    
    /*---------------------air push--------------------------------*/
    public function airpush(){
        $this->data['headtitle']="Push Notification";
        $this->data['menu_id']="30";
        $this->data['parent']="15";
        $this->data['campcat']=$this->basedata->getCampCat();
        $this->tempe->load($this->theme.'/modul',$this->theme.'/platform/camp_airpush',$this->data);
    }    
    /*---------------------end air push--------------------------------*/
    
    
    /*---------------------report--------------------------------*/
    public function rep_transac(){
        $this->data['headtitle']="Report";
        $this->data['menu_id']="29";
        $id="all";
        if($this->input->post('start')!=""){
            $start=date("Y-m-d",strtotime($this->input->post('start')));
        }else{
            $start="";
        }
        if($this->input->post('end')!=""){
            $end=date("Y-m-d",strtotime($this->input->post('end')));
        }else{
            $end="";
        }
        $this->settings['base_url'] = site_url('core/rep_transac');
        $this->settings['total_rows'] = $this->basedata->count_transac();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['transac']=$this->basedata->getTransac($id,$this->settings["per_page"], $this->data['page'],$start,$end);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/report/transaction',$this->data);
    }
    /*---------------------end report--------------------------------*/
    
    /*---------------------dashboard--------------------------------*/
    public function dashboard(){
        $this->data['headtitle']="Dashboard";
        $this->data['menu_id']="1";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/dashboard',$this->data);
    }
    
    /*---------------------end dashboard--------------------------------*/
    
    public function platform(){
        echo $this->ussd->test();
    }
    
    public function error(){
        $this->data['headtitle']="Error";
        $this->data['menu_id']="1";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/error',$this->data);
    }
	 
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */