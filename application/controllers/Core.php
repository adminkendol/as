<?php  

class Core extends Main_Controller {
 
    function __construct(){
        parent::__construct();
	
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
        if ($this->form_validation->run() == FALSE){
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
    
    /*---------------------dashboard--------------------------------*/
    public function dashboard(){
        $this->data['headtitle']="Dashboard";
        $this->data['menu_id']="1";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/dashboard',$this->data);
    }
    
    /*---------------------end dashboard--------------------------------*/
    
    public function error(){
        $this->data['headtitle']="Error";
        $this->data['menu_id']="1";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/error',$this->data);
    }
	 
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */