<?php  

class Core extends Main_Controller {
 
    function __construct(){
        parent::__construct();
	$this->load->library('ussd');
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