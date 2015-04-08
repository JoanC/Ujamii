<?php

class Admin  extends CI_Controller{
    
 public $data;
 
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
     $this->load->model('loanmodel');

     

}
 public function suAdmin(){
     
        $this->load->model('loanmodel');  
          //call the model function to get the department data
          $loanresult = $this->loanmodel->getLoans();           
          $data['loanlist'] = $loanresult;
          //load the department_view
          $this->load->view('admin/superadmin',$data);
 }

 public function loadBusinesses(){
     //load the department_model
          $this->load->model('businessmodel');  
          //call the model function to get the department data
          $bizresult = $this->businessmodel->getBusinesses();           
          $data['bizlist'] = $bizresult;
          //load the department_view
          $this->load->view('admin/businesses_view',$data);
    
    
    
    
}
public function loadLoans(){
    
          $this->load->model('loanmodel');  
          //call the model function to get the department data
          $loanresult = $this->loanmodel->getLoans();           
          $data['loanlist'] = $loanresult;
          //load the department_view
          $this->load->view('admin/loans_view',$data);
    
    
}
public function approveLoan(){
    
    
    
    
}
}
