<?php

Class Fakerusermodel extends CI_Model {

// Insert registration data in database
public function faker_insert($data) {

// Query to check whether username already exist or not
$condition = "username =" . "'" . $data['username'] . "'";
$this->db->select('*');
$this->db->from('lendee_tbl');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('lendee_tbl', $data);
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



}

?>



