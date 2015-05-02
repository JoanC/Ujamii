<?php

Class Businessmodel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

// Insert registration data in database
    public function register_business($data) {

// Query to check whether username already exist or not
        $condition = "business_name =" . "'" . $data['business_name'] . "'";
        $this->db->select('*');
        $this->db->from('Business_tbl');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {

// Query to insert data in database
            $this->db->insert('Business_tbl', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
        if ($query->num_rows() != 0) {
            return false;
        }
    }

    public function read_business_information() {


        $condition = "lendee_Id =" . "'" . $this->session->userdata('id') . "'";
        $this->db->select('*');
        $this->db->from('Business_tbl');
        $this->db->where($condition);
        $this->db->limit(1);


        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function portfolio() {



        $this->db->select('*');
        $this->db->from('Business_tbl');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function updateRating($portfoliobusinessrate){
//        $condition = "lendee_Id =" . "'" . $this->session->userdata('id') . "'";
//        $query= $this->db->update('Business_tbl as ');
//        
//      
//        $this->db->where($condition);
//        $this->db->limit(1);
//             $this->db->where('lendee.lendee_Id', $ratingdata['lendee_Id']);
//        $this->db->where('lendee.lendee_Id = business.lendee_Id');
//       $query= $this->db->update('lendee_tbl as lendee, Business_tbl as business');
       $this->db->where('lendee_Id', $this->session->userdata('id'));
       $updatedStatus=$this->db->update('Business_tbl',array('business_rating'=>$portfoliobusinessrate)); 
        
       if($updatedStatus){
        
       return true;
       }
       else{
        
       return false;
        
       }
        
    }

    public function getBusinessesOwners() {

        $this->db->select('*');
        $this->db->from('lendee_tbl');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getBusinesses() {
        $this->db->select('lendee_tbl.firstName,Business_tbl.bus_regId,Business_tbl.business_name,Business_tbl.business_category,Business_tbl.business_rating');
        $this->db->from('Business_tbl');
        $this->db->join('lendee_tbl', 'lendee_tbl.lendee_Id=Business_tbl.lendee_Id', 'inner');
        $query = $this->db->get();

//          $sql = 'SELECT firstName,bus_regId, business_name,business_category,business_rating FROM Business_tbl JOIN lendee_tbl ON Business_tbl.lendee_Id = lendee_tbl.lendee_Id';
//          $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

}
?>

