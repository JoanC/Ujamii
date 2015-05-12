<?php

class Admin extends CI_Controller {

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

    public function suAdmin() {

        $this->load->model('loanmodel');
       
        $loanresult = $this->loanmodel->getLoans();
        $data['loanlist'] = $loanresult;
     
        $this->load->view('admin/superadmin', $data);
    }

    public function loadBusinesses() {
       
        $this->load->model('businessmodel');
       
        $bizresult = $this->businessmodel->getBusinesses();
        $data['bizlist'] = $bizresult;
       
        $this->load->view('admin/businesses_view', $data);
    }

    public function showBusinessowners() {
         $this->load->model('businessmodel');
         $bizresult = $this->businessmodel->getBusinessesOwners();
        $data['bizownerslist'] = $bizresult;
       
        $this->load->view('admin/businessOwners_view', $data);
        
    }

    public function loadLoans() {

        $this->load->model('loanmodel');
        //call the model function to get the department data
        $loanresult = $this->loanmodel->getLoans();
        $data['loanlist'] = $loanresult;
        //load the department_view
        $this->load->view('admin/loans_view', $data);
    }

    public function approveLoan() {
        $data = array(
            'loa_acc_approval' => "Approved"
        );
        $this->db->set("loa_acc_disbustment", "NOW()", FALSE);
        $this->db->set("loa_acc_modified_date", "NOW()", FALSE);
        $this->db->where(array('loa_acc_code' => $this->input->post('acc_number')));
        $this->db->update('loan_account');

        if (isset($_POST['btn_disapprove'])) {
            $data = array(
                'loa_acc_approval' => "Not Approved"
            );
            $this->db->set("loa_acc_disbustment", "NOW()", FALSE);
            $this->db->set("loa_acc_modified_date", "NOW()", FALSE);
            $this->db->where(array('loa_acc_code' => $this->input->post('acc_number')));
            $this->db->update('loan_account', $data);
        }
        redirect('disbursments/disbursment');
    }
     public function editWeights() {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("weightmodel");
        $this->load->model("suadminservice");
        $this->load->helper("url");

        $weightModel = new Weightmodel();
        $adminService = new Suadminservice();
//        $userID = $this->session->userdata('id');
//        $userModel->setUserID($userID);

        $retrievedWeightData = $adminService->getWeights($weightModel);
       
        $this->load->view("admin/adjustWeights", $retrievedWeightData);
//     $this->load->view('userheader');
//     $this->load->view('bPRating');
    }
     public function adjustWeights() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       $this->load->model("weightmodel");
        $this->load->model("suadminservice");

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('age', 'age', 'required|');
        $this->form_validation->set_rules('customer_type', 'customer_type', 'required');
        $this->form_validation->set_rules('housing', 'housing', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('purpose', 'purpose');
        $this->form_validation->set_rules('marital_status', 'maritalstatus');
        $this->form_validation->set_rules('dependents', 'deps', 'max_length[2]');
        $this->form_validation->set_rules('loan_amount', 'loan_amount');

        $this->form_validation->set_rules('business_type', 'business_type', 'required');
        $this->form_validation->set_rules('income', 'income', 'required');
        $this->form_validation->set_rules('asset_worth', 'asset worth', 'required');
        $this->form_validation->set_rules('num_employees', 'num_employees', 'required');
        $this->form_validation->set_rules('business_existence', 'business_existence', 'required');
//  var_dump($this->form_validation->run());

        if ($this->form_validation->run() == false) {

            $this->load->view('editPersonal');
        } else if ($this->form_validation->run() == true) {
            $editweightData = array(
                'age' => $this->input->post('age'),
                'customer_type' => $this->input->post('customer_type'),
                'housing' => $this->input->post('housing'),
                'gender' => $this->input->post('gender'),
                'marital_status' => $this->input->post('marital_status'),
                'dependents' => $this->input->post('dependents'),
                'purpose' => $this->input->post('purpose'),
                'loan_amount' => $this->input->post('loan_amount'),
                'business_type' => $this->input->post('business_type'),
                'income' => $this->input->post('income'),
                'asset_worth' => $this->input->post('asset_worth'),
                'num_employees' => $this->input->post('num_employees'),
                    'business_existence' => $this->input->post('business_existence')
//            $userModel->setUserID($this->input->post('userID', TRUE));
            );

            $dbCommited = $this->suadminservice->editweightDetails($editweightData);
            // var_dump($dbCommited);

            if ($dbCommited) {
                echo 'Success';
                redirect('admin/suAdmin'); //with success message
            } else {

                redirect(base_url()); //with error message
            }
        }//else            
    }


}
