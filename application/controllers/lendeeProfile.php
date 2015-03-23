<?php


 class LendeeProfile extends CI_Controller{
     
     public function __construct() {
     parent::__construct();
     $this->load->helper('url');
     $this->load->helper('form');

// Load form validation library
     $this->load->library('form_validation');

// Load session library
     $this->load->library('session');

// Load database
     $this->load->model('businessmodel');
     $this->load->model('usermodel');
     $this->load->model('userservice');
     

    
 }
 public function registerBusiness( ){
     
       $this->form_validation->set_rules('businessName', 'bizName', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('businessLocation', 'bizLocation', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('businessCategory', 'bizCategory', 'required|trim|max_length[30]');
        $this->form_validation->set_rules('businessDescription', 'bizDescription', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('assetWorth', 'asset', 'required|trim|max_length[10]|integer');
        $this->form_validation->set_rules('currentIncome', 'income', 'required|trim|max_length[10]|integer'); 
        $this->form_validation->set_message('integer', 'The field should contain only numbers');
        $this->form_validation->set_message('is_unique', 'This has already been used');
   
        
        //$user= $data;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userheader');
            $this->load->view('registerBusiness');
         } 
        
        else{
//            $lendee_Id=$this->login_database->getUserID($data);
//            var_dump($lendee_Id);
            $data = array(
            'business_name' => $this->input->post('businessName'),
            'business_location' => $this->input->post('businessLocation'),
            'business_category' => $this->input->post('businessCategory'),
            'business_description' => $this->input->post('businessDescription'),
            'lendee_Id' => $this->session->userdata('id'),
            'business_worth' => $this->input->post('assetWorth'),
            'business_current_income' => $this->input->post('currentIncome'),
             );
            $result = $this->businessmodel->register_business($data);
          //  var_dump($result);
              $this->data['main']= 'home';
       $this->load->view('temp',$this->data);
            
        }
       
   }
   
 public function loanApplication(){
     $this->load->view('userheader');
     $this->load->view('loanApplication');  
  
 }
 
 public function Rating(){
     
     
 }
 
  }//class
?>
