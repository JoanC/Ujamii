<?php

require_once APPPATH . 'controllers/index.php';

class LendeeProfile extends CI_Controller {

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
        $this->load->model('login_database');
        $this->load->model('userservice');
        $this->load->model('loanmodel');

        //$this->load->controller('index');
    }

    public function registerBusiness() {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('businessName', 'bizName', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('businessLocation', 'bizLocation', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('businessCategory', 'bizCategory', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('businessDescription', 'bizDescription', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('assetWorth', 'asset', 'required|trim|max_length[7]|integer');
        $this->form_validation->set_rules('currentIncome', 'income', 'required|trim|max_length[5]|integer');
        $this->form_validation->set_message('integer', 'The field should contain only numbers');
        $this->form_validation->set_message('is_unique', 'This has already been used');
        
//         $this->form_validation->set_message('max_length[i]', '');
        //$user= $data;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userheader');
            $this->load->view('registerBusiness');
        } else {
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
           if($result){ 
               
               $this->data['main'] = 'home';
               $this->load->view('temp', $this->data);
               
           }
           else{
             
               $this->load->view('userheader');
               echo"business registration was unsuccessful try again!";
            $this->load->view('registerBusiness');
           }
        }
    }

    public function loanApplication() {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('loanAmount', 'loanAmt', 'required|trim|max_length[7]|integer|callback_checkAmounts');
        $this->form_validation->set_rules('monthlyInstallment', 'monthIstl', '|required|trim|integer');
        $this->form_validation->set_rules('paymentPeriod', 'payPeriod', 'required|trim|max_length[2]|integer');
        $this->form_validation->set_rules('purpose', 'prpse', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('applicationDate', 'appDate', 'required');
        // $this->form_validation->set_rules('applicationDate','appDate','callback_checkDateFormat');
//        $this->form_validation->set_message('integer', 'This field should contain only numbers');
//        $this->form_validation->set_message('required', 'This field is required');
//        $this->form_validation->set_message('alpha', 'Input characters only');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userheader');
            $this->load->view('loanApplication');
        } else {
            $config['upload_path'] = "./uploads/";
            $config['allowed_types'] = 'pdf|doc|docx|odt';
            $config['max_size'] = '100000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('uploadedLoanapp')) {

                $data['image_error'] = $this->upload->display_errors();
                print_r($data);
                exit();
            } else {
                $upload_data = $this->upload->data();


//            $lendee_Id=$this->login_database->getUserID($data);
//            var_dump($lendee_Id);
                $loandata = array(
                    'loan_amount' => $this->input->post('loanAmount'),
                    'monthly_installment' => $this->input->post('monthlyInstallment'),
                    'payment_period' => $this->input->post('paymentPeriod'),
                    'purpose' => $this->input->post('purpose'),
                    //'application_date' => @date('Y-m-d', ($this->input->post('applicationDate'))),
                    'application_date' => $this->input->post('applicationDate'),
                    'uploaded_file' => $upload_data['file_name'],
                    'lendee_Id' => $this->session->userdata('id'),
                );

                $result = $this->loanmodel->applyLoan($loandata);
                if ($result) {
                    $message['success'] = "You have successfully signed up for a loan";
                    $this->load->view('header');
                    $this->data['main'] = 'home';
                    $this->load->view('home', $message);
                } else {
                    echo 'Something went wrong in your loan application!';
                }
            }
        }
    }

    public function checkAmounts($lnamount, $mthlyistlmet) {
        if ($mthlyistlmet > $lnamount) {
            $this->form_validation->set_message('checkAmounts', 'the monthly instzllments cannot be greate than loan amount');
            return FALSE;
        } else {
            return TRUE;
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

// public function addtorate(){
//     
////     $this->load->helper(array('form', 'url'));
////             $this->load->library('form_validation');        
////             $this->load->model("usermodel");
////             $this->load->model("userservice");
////             $this->load->helper("url");
//// 
////            $userModel=new UserModel();    
////            $userService=new UserService();
////            $userID =$this->session->userdata('id');
////            $userModel->setUserID($userID);
////             
////            $retievedUserData=$userService->getSelectedUserDetails($userModel);
////             
////            $this->load->view("rating",$retievedUserData);
//     $this->load->view('userheader');
//     $this->load->view('bPRating');
//     
//         
//     
//     
//     
// }
// public function rating(){
//     
//       $this->form_validation->set_rules('gender', 'gndr', 'required|');
//          $this->form_validation->set_rules('maritalStatus', 'maritstatus', 'required');
//         $this->form_validation->set_rules('dependents', 'deps', 'max_length[2]|required|integer');
//          $this->form_validation->set_rules('housing', 'house', 'required');
//         $this->form_validation->set_rules('numEmployees', 'emps', 'max_length[2]|required|integer');
//         $this->form_validation->set_rules('busExistence', 'existence', 'max_length[2]|required|integer');
//          $this->form_validation->set_message('integer', 'The field should contain only numbers');
//            if ($this->form_validation->run() == FALSE) {
//            $this->load->view('userheader');
//            $this->load->view('bPRating');
//         } 
//         else
//             { $ratingdata = array(
//            'gender' => $this->input->post('gender'),
//            'maritalStatus' => $this->input->post('maritalStatus'),
//            'No_of_dependents' => $this->input->post('dependents'),
//            'Housing' => $this->input->post('housing'),
//            'lendee_Id' => $this->session->userdata('id'),
//            'no_ofEmployees' => $this->input->post('numEmployees'),
//            'business_existence' => $this->input->post('busExistence'),
//             );
//            $result = $this->userservice->addRating($ratingdata);
//            if($result){
//               
//               
//               
//            
//              
//               
//            }
//                   
//             else{
//                 echo"Something went wrong while rating!!";
//             }
//           
//         }
//     
//     
// }

    function calculate_interest() {
        $data = null;

        $loan_amount = str_replace(",", "", $this->input->post('loan_amount'));
//        $loan_amount = $this->input->post('loan_amount'); // Loan amount start up

        $rate_per = $this->input->post('interest_rate') / 100; // Percentag of interest %
        $loan_peraid = $this->input->post('num_installments'); // Number for time to repayment
        //1 ==============instalment====================
        $data ['instalment'] = round(($loan_amount * $rate_per) / (1 - pow((1 + $rate_per), (-$loan_peraid))), -2);

        echo json_encode($data);
    }

}

//class
?>
