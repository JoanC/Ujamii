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
     $this->load->model('loanmodel');
// check if user is logged in
   

    
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
            $loandata = array(
            'business_name' => $this->input->post('businessName'),
            'business_location' => $this->input->post('businessLocation'),
            'business_category' => $this->input->post('businessCategory'),
            'business_description' => $this->input->post('businessDescription'),
            'lendee_Id' => $this->session->userdata('id'),
            'business_worth' => $this->input->post('assetWorth'),
            'business_current_income' => $this->input->post('currentIncome'),
             );
            $result = $this->businessmodel->register_business($loandata);
          //  var_dump($result);
              $this->data['main']= 'home';
              $this->load->view('temp',$this->data);
            
        }
       
   }
   
 public function loanApplication(){
     
       $this->form_validation->set_rules('loanAmount', 'loanAmt', 'required|trim|max_length[20]|integer');
        $this->form_validation->set_rules('monthlyInstallment', 'monthIstl', 'required|trim|max_length[20]|integer');
        $this->form_validation->set_rules('paymentPeriod', 'payPeriod', 'required|trim|max_length[30]|integer');
        $this->form_validation->set_rules('purpose', 'prpse', 'required|trim|max_length[100]');
         $this->form_validation->set_rules('applicationDate', 'appDate', 'required');
       // $this->form_validation->set_rules('applicationDate','appDate','callback_checkDateFormat');
        $this->form_validation->set_message('integer', 'The field should contain only numbers');
     
     
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userheader');
            $this->load->view('loanApplication');
         } 
        
        else{
            $config['upload_path']="./uploads/";
            $config['allowed_types']='pdf|doc|docx|odt';
            $config['max_size']='100000';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('uploadedLoanapp')){
                
                $data['image_error']=$this->upload->display_errors();
                print_r($data);
                exit();
            }
            else{
                $upload_data =$this->upload->data();
               
            
//            $lendee_Id=$this->login_database->getUserID($data);
//            var_dump($lendee_Id);
            $loandata = array(
             
            'loan_amount' => $this->input->post('loanAmount'),
            'monthly_installment' => $this->input->post('monthlyInstallment'),
            'payment_period' => $this->input->post('paymentPeriod'),
            'purpose' => $this->input->post('businessDescription'),
            //'application_date' => @date('Y-m-d', ($this->input->post('applicationDate'))),
            'application_date'=> $this->input->post('applicationDate'),
             'uploaded_file'=> $upload_data['file_name'],
            'lendee_Id' => $this->session->userdata('id'),
      
             );
          
            $result = $this->loanmodel->applyLoan($loandata);
          if ($result){
             $this->data['main']= 'home';
            $this->load->view('temp',$this->data);  
          }
            
          else{
              echo 'Something went wrong in your loan application!';
          }
            }  
            
        }
        
      
  
 }
 
 public function checkDateFormat($date) {
        $day = (int) substr($date, 0, 2);
    $month = (int) substr($date, 3, 2);
    $year = (int) substr($date, 6, 4);
    if (checkdate($month, $day, $year))
    return true;
        else {
        return false;
             }
    } 

  
 
 public function Rating(){
     
     
 }
 
  }//class
?>
