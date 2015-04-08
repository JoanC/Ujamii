<?php

class Index  extends CI_Controller{
    
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
     $this->load->model('login_database');


     

}
 
        
   public function index(){
       
       $this->load->helper('url');
       //$this->load->model("UserService");
       $this->data['main']= 'home';
       $this->load->view('temp',$this->data);
   }
   public function faker(){
     $this->load->view('faker');

   }
   public function about(){
        
         $this->data['main']= 'about-us';
         $this->load->view('temp',$this->data);
   }
   public function portfolio(){
         $this->data['main']= 'portfolio';
         $this->load->view('temp',$this->data);
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
         $this->data['main']= 'userRegisterView';
         $this->load->view('temp',$this->data);
            //$this->load->view('userRegisterView');
        
         
        }
        else
        {
             //loading the required model and service classes
             $this->load->model("usermodel");
             $this->load->model("userservice");
             $this->load->model("emailclass");
 
             
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
             
                $data['message_display']= 'Successfully signed up!';
                $this->load->view('header');
                $this->load->view('login_form',$data);
                $this->load->view('footer');
         
             
             //}
            // else{
             
             //redirect(base_url()); //with error message
             //}    
             
            }
            else{
                $data['error_message'] = 'Username already exists!';
                 //$this->load->view('userRegisterView');
                 
                 $this->load->view('header'); 
           
                 $this->load->view('userRegisterView',$data);
                 $this->load->view('footer');
            }
       
             
         
     
        }//else
      
    }//register    
// Check for user login process
    public function user_login_process() {

    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

    if ($this->form_validation->run() == FALSE) {
    //$this->load->view('login_form');
         $this->data['main'] = 'login_form';
           $this->load->view('temp',$this->data);
    } 
    else {
    $data = array(
    'username' => $this->input->post('username'),
    'password' => $this->input->post('password')
    );

    $result = $this->login_database->login($data);
    
        if($result){
      
            $sess_array = array(
              'username' => $this->input->post('username'),
              'firstName'=>$result->firstName,
              'id'=>$result->lendee_Id,
              'loginuser'=>TRUE
            );
   
                        $this->session->set_userdata($sess_array);
                        $user=$sess_array["username"];
                        $result = $this->login_database->read_user_information($user);
   
                    foreach ($result as $row)
                    {
                        $firstname['first']=$row->firstName;
                        $lastname=$row->lastName;
                        $username=$row->username;
                
                   
                        if($this->session->userdata('username')&&($username=='Admin')){
                            redirect('admin/suAdmin');
                        //$this->load->view('admin/superadmin');

                        }
                        else{
                            redirect('index/userprofile');
//                          

                        }
                    }


    }
     else 
         {
   
             $data['error_message']= 'Invalid Username or password';
             $this->load->view('header');
             //echo 'Invalid username or Password';
                $this->load->view( 'login_form',$data);
                $this->load->view('footer');
         }
    
    }
  
    }

    public function userprofile(){
            $user= $this->session->userdata('username');
             $result = $this->login_database->read_user_information($user);
               foreach ($result as $row)
                    {
                        $firstname['first']=$row->firstName;
                        $lastname=$row->lastName;
                        $username=$row->username;
                        
         
                    }
               
               
               
            $this->load->view('userheader');
            $this->data['main'] = 'login_form';
            $this->load->view('admin_page',$firstname);
         
          
        
    }
//logout
    public function logoutuser() {
         if ($this->session->userdata('loginuser')) {
         $this->session->sess_destroy();
         $this->data['main'] = 'home';
         $this->load->view('temp',$this->data);
         }
   

      }

      public function showBusinesses(){
          $showbusiness = $this->businessmodel->read_business_information();
              
          
          
      }
   
 
  
  
     
     
    function removeRegisteredUser($userID){
     
     
    //echo "request for remeving user with  userID ".$userID;
             $this->load->model("usermodel");
             $this->load->model("userservice");
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
             $this->load->model("usermodel");
             $this->load->model("userservice");
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
             $this->load->model("usermodel");
             $this->load->model("userservice");
 
             
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
     
    $this->load->model("usermodel");
    $this->load->model("userservice");
 
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
     
    echo "Username is available";
     
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

 





