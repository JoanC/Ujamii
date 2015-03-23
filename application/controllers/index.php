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
   
   public function about(){
         $this->data['main']= 'about-us';
         $this->load->view('temp',$this->data);
   }
   public function portfolio(){
         $this->data['main']= 'portfolio';
         $this->load->view('temp',$this->data);
   }
   
   public function registerBusiness(){
       $this->data['main'] = 'registerBusiness';
       $this->load->view('temp',$this->data);
   }
       
// Show login page

/*


// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'name' => $this->input->post('name'),
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password')
);
$result = $this->login_database->registration_insert($data) ;
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}
*/
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
//redirect();
//$this->lendeeProfile->registerBusiness($data['username']);
//$results= $this->login_database->getUserID($data);
//var_dump($results);

//if($result == TRUE){
    if($result){
    //var_dump($result);
$sess_array = array(
'username' => $this->input->post('username'),
 'id'=>$result->lendee_Id,
 'loginuser'=>TRUE
);
//var_dump($sess_array);
//
//// Add user data in session
$this->session->set_userdata($sess_array);
//$user = $this->session->userdata('loginuser');
//$username=$user["username"];
//var_dump($user);
$user=$sess_array["username"];
//var_dump($user);
$result = $this->login_database->read_user_information($user);
//var_dump($result);
                foreach ($result as $row)
                {
                    $firstname['first']=$row->firstName;
                    $lastname=$row->lastName;
                    $this->load->view('userheader');
                    //var_dump($firstname);

//$this->load->view($main);
                    if($this->session->userdata('username')){
                    $this->load->view('admin_page',$firstname);
                    }
                    else{
                        $this->data['main'] = 'login_form';
                        $this->load->view('temp',$this->data);
                        
                    }
                }

    


//$this->data['main'] = 'admin_page';

//$this->load->view('usertemp');

}
 else 
     {
//     $data = array(
//    ' error_message' => 'Invalid Username or Password'
//          );
     $data['error_message']= 'Invalid Username or password';

        
                $this->load->view('header');
                //echo 'Invalid username or Password';
                $this->load->view( 'login_form',$data);
                 $this->load->view('footer');
     }
//

//if($result != false){
//$data = array(
//
//'username' =>$result[0]->username,
//'password' =>$result[0]->password,
//'fName' =>$result[0]->firstName,
//'lName' =>$result[0]->lastName,
//'address' =>$result[0]->address,
//'email' =>$result[0]->email,
//'age' =>$result[0]->age,
// 'telephone' =>$result[0]->telephone,
//
//);
//var_dump(data);
// $this->data['main'] = 'admin_page';
// $this->load->view('usertemp',$this->data);
////
//}
}
//else{
//$data = array(
//'error_message' => 'Invalid Username or Password'
//);
////$this->load->view('login_form', $data);
// $this->data['main'] = 'login_form';
//       $this->load->view($data,'temp',$this->data);
//}
//}
}


//logout
public function logoutuser() {
     if ($this->session->userdata('loginuser')) {
     $this->session->sess_destroy();
     $this->data['main'] = 'home';
      $this->load->view('temp',$this->data);
     }

//// Removing session data
//$sess_array = array(
//'username' => False,
//    'loginuser'=>False
//   
//);
////$this->session->unset_userdata('loginuser', $sess_array);
//$this->session->unset_userdata($sess_array);
//$data['message_display'] = 'Successfully Logout';
////$this->load->view('login_form', $data);
//
//$this->session->sess_destroy();
// $this->data['main'] = 'home';
//       $this->load->view('temp',$this->data);
}


   
 
   
   
   //public function user_login() {
     //  $this->load->view('login');
   //}

   //public function user_registration_show() {
     //  $this->load->view('sign-up');
   //}
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
             
                //echo "registration email should be sent";
         
             // $emailClass=new EmailClass();
             
             // $emailSentStatus=$emailClass->sendEmail("kiruijoan@gmail.com","kiruijoan@gmail.com","new user registration","jckirui@wordpress.com");
             
           //  if($emailSentStatus){
             
             //redirect(site_url('login_form')); //with success message
               // $this->load->view('login_form');
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
                echo 'Username already exists!';
                 //$this->load->view('userRegisterView');
                 $this->data['main'] = 'userRegisterView';
                 $this->load->view('temp',$this->data);
            }
       
             
             /*  $result = $this->$userService->createNewUser() ;
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login_form');
                   } 
            else {
                   $data['message_display'] = 'Username already exist!';
            $this->load->view('userRegisterView');}*/
     
        }//else
      
    }//register    
     
     
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




