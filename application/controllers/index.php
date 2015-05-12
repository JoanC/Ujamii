<?php

class Index extends CI_Controller {

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
        $this->load->model('userservice');
        $this->load->model('businessmodel');
        $this->load->model('loanmodel');
    }

    public function index() {

        $this->load->helper('url');
        //$this->load->model("UserService");
        $this->data['main'] = 'home';
        $this->load->view('temp', $this->data);
    }

    public function faker() {
        $this->load->view('faker');
    }

    public function about() {

        $this->data['main'] = 'about-us';
        $this->load->view('temp', $this->data);
    }

    public function portfolio() {
        $result = $this->businessmodel->portfolio();
        $data['bizdetails'] = $result;
        $this->load->view('header');
        $this->load->view('portfolio', $data);
        //var_dump($data);
    }

    public function register() {

        //echo "registering new user";
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|xss_clean|trim|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim');
        $this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|matches[password]|xss_clean|trim');
        $this->form_validation->set_rules('gender', 'gndr', 'required|');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|trim');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim|exact_length[10]|integer');



        if ($this->form_validation->run() == FALSE) {
            $this->data['main'] = 'userRegisterView';
            $this->load->view('temp', $this->data);
            //$this->load->view('userRegisterView');
        } else {
            //loading the required model and service classes
            $this->load->model("usermodel");
            $this->load->model("userservice");
            $this->load->model("emailclass");


            $userModel = new UserModel();
            $userService = new UserService();

            $userModel->setUserName($this->input->post('username', TRUE));
            $userModel->setFirstName($this->input->post('firstName', TRUE));
            $userModel->setLastName($this->input->post('lastName', TRUE));
            $userModel->setPassword($this->input->post('password', TRUE));
            $userModel->setGender($this->input->post('gender', TRUE));
            $userModel->setAddress($this->input->post('address', TRUE));
            $userModel->setTelephone($this->input->post('telephone', TRUE));
            $userModel->setEmail($this->input->post('email', TRUE));





            $dbInserted = $userService->createNewUser($userModel);


            if ($dbInserted) {

                $data['message_display'] = 'Successfully signed up!';
                $this->load->view('header');
                $this->load->view('login_form', $data);
                $this->load->view('footer');


                //}
                // else{
                //redirect(base_url()); //with error message
                //}    
            } else {
                $data['error_message'] = 'Username already exists!';
                //$this->load->view('userRegisterView');

                $this->load->view('header');

                $this->load->view('userRegisterView', $data);
                $this->load->view('footer');
            }
        }//else
    }

//register    
// Check for user login process

    public function user_login_process() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('login_form');
            $this->data['main'] = 'login_form';
            $this->load->view('temp', $this->data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $result = $this->login_database->login($data);

            if ($result) {

                $sess_array = array(
                    'username' => $this->input->post('username'),
                    'firstName' => $result->firstName,
                    'id' => $result->lendee_Id,
                    'loginuser' => TRUE
                );

                $this->session->set_userdata($sess_array);
                $user = $sess_array["username"];
                $result = $this->login_database->read_user_information($user);

                foreach ($result as $row) {
                    $firstname['first'] = $row->firstName;
                    $lastname = $row->lastName;
                    $username = $row->username;


                    if ($this->session->userdata('username') && ($username == 'JAdmin')) {
                        redirect('admin/suAdmin');
                        //$this->load->view('admin/superadmin');
                    } else {
                        redirect('index/userprofile');
//                          
                    }
                }
            } else {

                $data['error_message'] = 'Invalid Username or password';
                $this->load->view('header');
                //echo 'Invalid username or Password';
                $this->load->view('login_form', $data);
                $this->load->view('footer');
            }
        }
    }

    public function userprofile() {
        $user = $this->session->userdata('username');
        $result = $this->login_database->read_user_information($user);
        foreach ($result as $row) {
            $personal['first'] = $row->firstName;
            $personal['age'] = $row->age;
            $personal['telephone'] = $row->telephone;
            $personal['address'] = $row->address;
            $personal['email'] = $row->email;
            $personal['userName'] = $row->username;
            // $personal['rating'] = 3 + 4 * 10;
            $lastname = $row->lastName;
            $username = $row->username;
        }
        //$personal['rating']=0;
//        $result1=$this->loanmodel->checkifexistLoan();

        $id = $this->session->userdata('id');
        $totalRateData = $this->login_database->user_rate($id);
        //var_dump($totalRateData);
        //$personal['rating']= $this->login_database->user_rate($id);
//         $id= $this->session->userdata('id');
//         $res = $this->loanmodel->getLoanStatus($id);
//         var_dump($res);
//         $loan['loanstatus']=$res->status;
        foreach ($totalRateData as $rowdata) {
            //personal data
            $ratedata['age'] = $rowdata->age;
            $ratedata['customer_type'] = $rowdata->lendee_type;
            $ratedata['housing'] = $rowdata->Housing;
            $ratedata['gender'] = $rowdata->gender;
            $ratedata['marital_status'] = $rowdata->maritalStatus;
            $ratedata['dependents'] = $rowdata->No_of_dependents;
            //business data
            $ratedata['business_type'] = $rowdata->business_category;
            $ratedata['income'] = $rowdata->business_current_income;
            $ratedata['asset_worth'] = $rowdata->business_worth;
            $ratedata['num_employees'] = $rowdata->no_ofEmployees;
            $ratedata['existence'] = $rowdata->business_existence;
            //loan data
            $ratedata['purpose'] = $rowdata->purpose;
            $ratedata['loan_amount'] = $rowdata->loan_amount;
        }

        $weights = $this->loanmodel->getWeights();
        //var_dump($weights);
        foreach ($weights as $weight) {
            //personal weights
            $rateWeight['ageW'] = $weight->age;
            $rateWeight['customer-typeW'] = $weight->customer_type;
            $rateWeight['housingW'] = $weight->housing;
            $rateWeight['genderW'] = $weight->gender;
            $rateWeight['marital_statusW'] = $weight->marital_status;
            $rateWeight['dependentsW'] = $weight->dependents;
            //business weights
            $rateWeight['business_typeW'] = $weight->business_type;
            $rateWeight['incomeW'] = $weight->income;
            $rateWeight['assert_worthW'] = $weight->asset_worth;
            $rateWeight['num_employeesW'] = $weight->num_employees;
            $rateWeight['business_existenceW'] = $weight->business_existence;
            //loan weights
            $rateWeight['purposeW'] = $weight->purpose;
            $rateWeight['loan_amountW'] = $weight->loan_amount;
        }
        //*****ADD THIS FOR NEW USERS******
        error_reporting(0);
        $rating = 0;
        $businessrating = 0;
        $personalrating = 0;
        
        //********rating on personal details**********
        //age
        if ($ratedata['age'] >= 18 && $ratedata['age'] <= 25) {
           $age18rate= 2* $rateWeight['ageW'];
            $rating +=$age18rate ;
        } else if ($ratedata['age'] >= 26 && $ratedata['age'] <= 55) {
            $age26rate=3*$rateWeight['ageW'];
            $rating +=$age26rate ;
        } else if ($ratedata['age'] >= 56 && $ratedata['age'] <= 100) {
            $age56rate=1*$rateWeight['ageW'];
            $rating += $age56rate;
        }
//        echo $rating;
        //customer type
        if ($ratedata['customer_type'] == "first") {
           $typefirst=0*$rateWeight['customer-typeW'];
            $rating += $typefirst;
           
        } else if ($ratedata['customer_type'] == "return") {
             $typereturn=1*$rateWeight['customer-typeW'];
             $rating+=$typereturn;
//         echo $rating;
        }
        //housing
        if ($ratedata['housing'] == "Rent") {
            $raterent=2*$rateWeight['housingW'];
            $rating+=$raterent;
           
        } else if ($ratedata['housing'] == "Free") {
            $ratefree=0* $rateWeight['housingW'];
            $rating+=$ratefree;
           
        } else if ($ratedata['housing'] == "Own") {
            $rateown=1* $rateWeight['housingW'];
            $rating+=$rateown;
            
           
        }
        //gender
        if ($ratedata['gender'] == "male") {
            $malerate=1* $rateWeight['genderW'];
            $rating+= $malerate;
           
        } else if ($ratedata['gender'] == "female") {
            $femalerate=2*$rateWeight['genderW'];
            $rating+=$femalerate;
//        echo $rating;
        }
        //marital status
        if ($ratedata['marital_status'] == "single") {
            $singlerate=1* $rateWeight['marital_statusW'];
            $rating+=$singlerate;
            
        } else if ($ratedata['marital_status'] == "married") {
            $marriedrate=2* $rateWeight['marital_statusW'];
            $rating+= $marriedrate;
         
        } else if ($ratedata['marital_status'] == "divorced") {
            $divorcedrate=1*$rateWeight['marital_statusW'];
            $rating+=$divorcedrate;
            
        }
//         echo $rating;
        //number of dependents
        if ($ratedata['dependents'] > 0) {
            $hasdependents=2*$rateWeight['dependentsW'];
            $rating+=  $hasdependents;
           
        } else if ($ratedata['dependents'] <= 0) {
            $nodependents=1*$rateWeight['dependentsW'];
            $rating+=$nodependents;
            
        }
//         echo $rating;
//        $rating*=2;
        $personalrating = $rating;
       
        //******rating on loan**********
        //purpose
        if ($ratedata['purpose'] == "businessExpenses") {
            $businessExp=1*$rateWeight['purposeW'];
            $rating+=$businessExp;
            
        } else if ($ratedata['purpose'] == "expandBusiness") {
            $expandBusiness=3*$rateWeight['purposeW'];
            $rating+=$expandBusiness;
            
        } else if ($ratedata['purpose'] == "initiateAproject") {
            $initiateProject=2*$rateWeight['purposeW'];
            $rating+=$initiateProject;
           
        }
        //loan amount
        if ($ratedata['loan_amount'] >= ($ratedata['income'] * 2)) {
          $loan_amountrate=1*$rateWeight['loan_amountW'];
            $rating+=$loan_amountrate;
          
        }
//         echo $rating;
//         $rating*=1;
        $loanrating = $rating - $personalrating;

        //*******rating on business****
        //business type
        if ($ratedata['business_type'] == "creative") {
            $creativerate=1*$rateWeight['business_typeW'];
            $rating+=$creativerate;
         
        } else if ($ratedata['business_type'] == "service") {
            $servicerate=3* $rateWeight['business_typeW'];
            $rating+=$servicerate;
            
        } else if ($ratedata['business_type'] == "juaKali") {
            $juakalirate=2*$rateWeight['business_typeW'];
            $rating+=$juakalirate;
            
        }
//        echo $rating;
        //income
        if ($ratedata['income'] <= 40000) {
            $incomerate=1*$rateWeight['incomeW'];
            $rating+=$incomerate;
            
        } 
//        echo $rating;
        //asset-worth
        if (($ratedata['asset_worth'] / 2) > $ratedata['loan_amount']) {
            $assetrate=1*$rateWeight['assert_worthW'];
            $rating+=$assetrate;
            
        } 
        
        //number of employees
        if ($ratedata['num_employees'] >= 2) {
            $employeesrate=1*$rateWeight['num_employeesW'];
            $rating+=$employeesrate;
            
        } 
//        echo $rating;
        //business existence
        if ($ratedata['existence'] >= 2) {
            $busovertwoyears=2*$rateWeight['business_existenceW'];
            $rating+=$busovertwoyears;
            $rating*= $rateWeight['business_existenceW'];
        } else if ($ratedata['existence'] < 2) {
            $busbelowtwoyears=1*$rateWeight['business_existenceW'];
            $rating+=$busbelowtwoyears;
            
        }
//        echo $rating;
//         $rating*=3;
        $businessrating = $rating - $loanrating;
        $portfoliobusinessrate = ($loanrating + $personalrating);
        $returnsrating = $this->businessmodel->updateRating($portfoliobusinessrate);
        //var_dump($returnsrating);
//         $sess_rating =array(
//             'businessRating'=>$businessrating,
//         );
//         $this->session->set_userdata($sess_rating);
//                $bizRating = $sess_rating["businessRating"];
        //echo $rating;
       
        $totrating = $this->userservice->updateRating($rating);

        $personal['rating'] = $rating;

        $this->load->view('userheader');
        $this->load->view('admin_page', $personal);
    }

    public function addtorate() {


        $this->load->view('userheader');
        $this->load->view('bPRating');
    }

    public function rating() {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //  $this->form_validation->set_rules('gender', 'gndr', 'required|');
        $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer', 'callback_validateage');
        $this->form_validation->set_rules('maritalStatus', 'maritstatus', 'required');
        $this->form_validation->set_rules('dependents', 'deps', 'max_length[2]|required');
        $this->form_validation->set_rules('housing', 'house', 'required');
        $this->form_validation->set_rules('numEmployees', 'emps', 'max_length[2]|required');
        $this->form_validation->set_rules('busExistence', 'existence', 'max_length[2]|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userheader');
            $this->load->view('bPRating');
        } else {
            $ratingdata = array(
                //  'gender' => $this->input->post('gender'),
                'age' => $this->input->post('age'),
                'maritalStatus' => $this->input->post('maritalStatus'),
                'No_of_dependents' => $this->input->post('dependents'),
                'Housing' => $this->input->post('housing'),
                'lendee_Id' => $this->session->userdata('id'),
                'no_ofEmployees' => $this->input->post('numEmployees'),
                'business_existence' => $this->input->post('busExistence'),
            );
            $result = $this->userservice->addRating($ratingdata);
            if ($result) {
//               $data['message_display']= 'Successfully rated!';
//               echo $message_display;

                redirect('index/userprofile');
            } else {
                $data['error_message'] = 'Register a business!';

                $this->load->view('userheader', $data);
                $this->load->view('registerBusiness');
            }
        }
    }

    public function validateage($age) {
        if ($age < 18) {
//            $this->form_validation->set_message('validateage', 'The %s field cannot be under 18');
            return false;
        } else
            return true;
    }

    public function editPersonal() {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("usermodel");
        $this->load->model("userservice");
        $this->load->helper("url");

        $userModel = new UserModel();
        $userService = new UserService();
        $userID = $this->session->userdata('id');
        $userModel->setUserID($userID);

        $retievedUserData = $userService->getSelectedUserDetails($userModel);
        $this->load->view('userheader');
        $this->load->view("editPersonal", $retievedUserData);
//     $this->load->view('userheader');
//     $this->load->view('bPRating');
    }

//logout
    public function logoutuser() {
        if ($this->session->userdata('loginuser')) {
            $this->session->sess_destroy();
            $this->data['main'] = 'home';
            $this->load->view('temp', $this->data);
        }
    }

    function removeRegisteredUser($userID) {


        //echo "request for remeving user with  userID ".$userID;
        $this->load->model("usermodel");
        $this->load->model("userservice");
        $this->load->helper("url");

        $userModel = new UserModel();
        $userService = new UserService();

        $userModel->setUserID($userID);

        $userService->removeRegisteredUser($userModel);

        redirect(base_url()); //with error message
    }

//removeRegisteredUser

    function editUserDetails($userID) {

        //echo "request for editing user with userID ".$userID;

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("usermodel");
        $this->load->model("userservice");
        $this->load->helper("url");

        $userModel = new UserModel();
        $userService = new UserService();

        $userModel->setUserID($userID);

        $retievedUserData = $userService->getSelectedUserDetails($userModel);

        $this->load->view("userEditView", $retievedUserData);
    }

//display Edit user details from

    public function editUser() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|xss_clean|trim|alpha_numeric');
        $this->form_validation->set_rules('firstName', 'FirstName', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('lastName', 'LastName', 'required|xss_clean|trim|alpha');
        $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer');
        $this->form_validation->set_rules('gender', 'gndr');
        $this->form_validation->set_rules('maritalStatus', 'maritstatus');
        $this->form_validation->set_rules('dependents', 'deps', 'max_length[2]');
        $this->form_validation->set_rules('housing', 'house');

        $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim|exact_length[10]|integer');

//  var_dump($this->form_validation->run());

        if ($this->form_validation->run() == false) {

            $this->load->view('editPersonal');
        } else if ($this->form_validation->run() == true) {
            $edituserData = array(
                'username' => $this->input->post('username'),
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'gender' => $this->input->post('gender'),
                'maritalStatus' => $this->input->post('maritalStatus'),
                'dependents' => $this->input->post('dependents'),
                'housing' => $this->input->post('housing'),
                'age' => $this->input->post('age'),
                'address' => $this->input->post('address'),
                'telephone' => $this->input->post('telephone'),
                'email' => $this->input->post('email')
//            $userModel->setUserID($this->input->post('userID', TRUE));
            );

            $dbCommited = $this->userservice->editUserDetails($edituserData);
            // var_dump($dbCommited);

            if ($dbCommited) {
                echo 'Success';
                redirect('index/userprofile'); //with success message
            } else {

                redirect(base_url()); //with error message
            }
        }//else            
    }

//editUser    

    function ajaxValidation() {

        $this->load->model("usermodel");
        $this->load->model("userservice");

        $userModel = new UserModel();
        $userService = new UserService();
        //validating user input using ajax

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $telephone = $this->input->post('telephone');
        $age = $this->input->post('age');
        $lastName = $this->input->post('lastName');
        $firstName = $this->input->post('firstName');
        $password = $this->input->post('password');
        $passwordConf = $this->input->post('passwordConf');

        //username validate                
        if (isset($username) && $username != "") {

            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|xss_clean|trim|alpha');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            } else {

                $userService = new UserService();
                $userModel = new UserModel();

                $userModel->setUserName($username);

                $userStatus = $userService->isUserNamealreadyRegisterd($userModel);

                if ($userStatus) {

                    echo "Username is already taken";
                } else {

                    echo "Username is available";
                }
            }
        }//username
        //validating email

        if (isset($email) && $email != "") {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|trim');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            }
        }//email
        //validating address

        if (isset($address) && $address != "") {

            $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            }
        }//address
        //validating age

        if (isset($age) && $age != "") {

            $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            }
        }//age
        //validating telephone

        if (isset($telephone) && $telephone != "") {

            $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim|exact_length[10]|integer');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            }
        }//telephone
        //validating first name

        if (isset($firstName) && $firstName != "") {

            $this->form_validation->set_rules('firstName', 'First Name', 'required|xss_clean|trim|alpha');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            }
        }//firstName
        //validating last name

        if (isset($lastName) && $lastName != "") {

            $this->form_validation->set_rules('lastName', 'Last Name', 'required|xss_clean|trim|alpha');

            if ($this->form_validation->run() == FALSE) {

                echo validation_errors();
            }
        }//lastName




        if (isset($password) && $password != "" && isset($passwordConf) && $passwordConf != "") {


            if ($password != $passwordConf) {

                echo "Password and Password Confirmation field does not match";
            }
        }//password
    }

//ajaxValidation
}

//class

 





