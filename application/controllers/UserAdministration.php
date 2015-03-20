<?php
 
class userAdministration extends CI_Controller {
 
 
    public function index()
    {
        echo 'welcome to userAdministration Controller';
    }
     
     
    public function register(){
     
        //echo "registering new user";
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
     
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|xss_clean|trim|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim');
        $this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|matches[password]|xss_clean|trim');
        $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|trim');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim|exact_length[10]|integer');
 
 
 
        if ($this->form_validation->run() == FALSE){
         
            $this->load->view('userRegisterView');
         
        }
        else
        {
             //loading the required model and service classes
             $this->load->model("UserModel");
             $this->load->model("UserService");
             $this->load->model("EmailClass");
 
             
            $userModel=new UserModel();    
            $userService=new UserService();
             
            $userModel->setUserName($this->input->post('username', TRUE));
            $userModel->setFirstName($this->input->post('firstName', TRUE));
            $userModel->setLastName($this->input->post('lastName', TRUE));
            $userModel->setPassword($this->input->post('password', TRUE));
            $userModel->setAge($this->input->post('age', TRUE));
            $userModel->setAddress($this->input->post('address', TRUE));
            $userModel->setTelephone($this->input->post('telephone', TRUE));
            $userModel->setEmail($this->input->post('email', TRUE));
       
             
            
            
     
            $dbInserted=$userService->createNewUser($userModel);
 
             
            if($dbInserted){
             
                //echo "registration email should be sent";
         
              $emailClass=new EmailClass();
             
              $emailSentStatus=$emailClass->sendEmail("chathuranga.t@gmail.com","chathuranga.t@gmail.com","new user registration","chathurangat.blogspot.com");
             
             if($emailSentStatus){
             
             redirect(base_url()); //with success message
             
             }
             else{
             
             redirect(base_url()); //with error message
             }    
             
            }//if
       
             
            
     
        }//else            
    }//register    
     
     
    function removeRegisteredUser($userID){
     
     
    //echo "request for remeving user with  userID ".$userID;
             $this->load->model("UserModel");
             $this->load->model("UserService");
             $this->load->helper("url");
 
            $userModel=new UserModel();    
            $userService=new UserService();
       
            $userModel->setUserID($userID);
             
            $userService->removeRegisteredUser($userModel);
             
            redirect(base_url()); //with error message
             
          
    }//removeRegisteredUser
     
     
     
    function editUserDetails($userID){
     
    //echo "request for editing user with userID ".$userID;
     
             $this->load->helper(array('form', 'url'));
             $this->load->library('form_validation');        
             $this->load->model("UserModel");
             $this->load->model("UserService");
             $this->load->helper("url");
 
            $userModel=new UserModel();    
            $userService=new UserService();
       
            $userModel->setUserID($userID);
             
            $retievedUserData=$userService->getSelectedUserDetails($userModel);
             
            $this->load->view("userEditView",$retievedUserData);
             
     
    }//display Edit user details from
     
     
     
     
    public function editUser(){
     
        //echo "registering new user";
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
     
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|xss_clean|trim|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim');
        $this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|matches[password]|xss_clean|trim');
        $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|trim');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim|exact_length[10]|integer');
 
 
 
        if ($this->form_validation->run() == FALSE){
         
            $this->load->view('userRegisterView');
         
        }
        else
        {
             //loading the required model and service classes
             $this->load->model("UserModel");
             $this->load->model("UserService");
 
             
            $userModel=new UserModel();    
            $userService=new UserService();
             
            $userModel->setUserName($this->input->post('username', TRUE));
            $userModel->setFirstName($this->input->post('firstName', TRUE));
            $userModel->setLastName($this->input->post('lastName', TRUE));
            $userModel->setPassword($this->input->post('password', TRUE));
            $userModel->setAge($this->input->post('age', TRUE));
            $userModel->setAddress($this->input->post('address', TRUE));
            $userModel->setTelephone($this->input->post('telephone', TRUE));
            $userModel->setEmail($this->input->post('email', TRUE));
            $userModel->setUserID($this->input->post('userID', TRUE));    
       
             
            
             
            $dbCommited=$userService->editUserDetails($userModel);
             
             
            if($dbCommited){
             
             redirect(base_url()); //with success message
             
             }
             else{
             
             redirect(base_url()); //with error message
             }    
             
       
             
            
     
        }//else            
    }//editUser    
     
     
     
    function ajaxValidation(){
     
    $this->load->model("UserModel");
    $this->load->model("UserService");
 
      $userModel=new UserModel();    
      $userService=new UserService();
    //validating user input using ajax
     
     $this->load->helper(array('form', 'url'));
     $this->load->library('form_validation');
     
    $username=$this->input->post('username');
    $email=$this->input->post('email');
    $address=$this->input->post('address');
    $telephone=$this->input->post('telephone');
    $age=$this->input->post('age');
    $lastName=$this->input->post('lastName');
    $firstName=$this->input->post('firstName');
    $password=$this->input->post('password');    
    $passwordConf=$this->input->post('passwordConf');        
         
    //username validate                
    if(isset($username) && $username!=""){
     
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|xss_clean|trim|alpha');
 
    if($this->form_validation->run() == FALSE){
     
    echo validation_errors();
     
    }
    else{
     
    $userService=new UserService();
    $userModel=new UserModel();
     
    $userModel->setUserName($username);
     
    $userStatus=$userService->isUserNamealreadyRegisterd($userModel);
     
    if($userStatus){
     
    echo "Username is already taken";
     
    }
    else{
     
    echo "Username is avaialable";
     
    }
    }
    }//username
     
     
     
    //validating email
     
    if(isset($email) && $email!="" ){
     
     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|trim');
 
    if($this->form_validation->run() == FALSE){
     
    echo validation_errors();
     
    }
     
    }//email
     
     
      //validating address
     
        if(isset($address) && $address!="" ){
     
        $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');
 
        if($this->form_validation->run() == FALSE){
     
        echo validation_errors();
     
       }
 
       }//address
     
     
     
         
     
       //validating age
     
       if(isset($age) && $age!="" ){
     
         $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer');
 
        if($this->form_validation->run() == FALSE){
     
        echo validation_errors();
     
         }
                  
        }//age
     
     
        //validating telephone
     
        if(isset($telephone) && $telephone!="" ){
     
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim|exact_length[10]|integer');
 
        if($this->form_validation->run() == FALSE){
     
        echo validation_errors();
     
         }
                  
        }//telephone
     
     
       //validating first name
     
        if(isset($firstName) && $firstName!="" ){
     
          $this->form_validation->set_rules('firstName', 'First Name', 'required|xss_clean|trim|alpha');
 
        if($this->form_validation->run() == FALSE){
     
          echo validation_errors();
     
         }
                  
        }//firstName
     
     
     
        //validating last name
     
        if(isset($lastName) && $lastName!="" ){
     
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|xss_clean|trim|alpha');
 
        if($this->form_validation->run() == FALSE){
     
         echo validation_errors();
     
         }
                  
        }//lastName
         
         
         
         
        if(isset($password) && $password!="" && isset($passwordConf) && $passwordConf!="" ){
         
     
        if($password!=$passwordConf){
         
        echo  "Password and Password Confirmation field does not match";
                 
        }
 
        }//password
     
     
     
    }//ajaxValidation
     
}//class
 
?>
