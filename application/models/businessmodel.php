<?php

Class Businessmodel extends CI_Model {
     function __construct()
    {
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
//
//// Read data using username and password
//public function login($data) {
//
//$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
//$this->db->select('*');
//$this->db->from('lendee_tbl');
//$this->db->where($condition);
//$this->db->limit(1);
//$query = $this->db->get();
//
//if ($query->num_rows() == 1) {
//return true;
//} else {
//return false;
//}
//}
//
//// Read data from database to show data in admin page
//public function read_user_information($user) {
//
//$condition = "username =" . "'" . $user. "'";
//$this->db->select('*');
//$this->db->from('lendee_tbl');
//$this->db->where($condition);
//$this->db->limit(1);
//$query = $this->db->get();
//
//if ($query->num_rows() == 1) {
//return $query->result();
//} else {
//return false;
//}
//}

}

?>

