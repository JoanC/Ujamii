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

}
