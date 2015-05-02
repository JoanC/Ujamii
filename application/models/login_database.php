<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
    public function registration_insert($data) {

// Query to check whether username already exist or not
        $condition = "user_name =" . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('lendee_tbl');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        /* if ($query->num_rows() == 0) {

          // Query to insert data in database
          $this->db->insert('user_login', $data);
          if ($this->db->affected_rows() > 0) {
          return true;
          }
          } else {
          return false;
          } */
        if ($query->num_rows() != 0) {
            return false;
        }
    }

// Read data using username and password
    public function login($data) {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
        // $this->db->where('password', md5($password));
        $this->db->select('*');
        $this->db->from('lendee_tbl');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
//return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($user) {


        $condition = "username =" . "'" . $user . "'";
        $this->db->select('*');
        $this->db->from('lendee_tbl');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function user_rate($id) {
//       $condition = "lendee_Id =" . "'" . $id . "'";
//       $this->db->select('*');
       
       $this->db->where('lendee_tbl.lendee_Id',$id);
        $this->db->from('lendee_tbl');
//        $this->db->where('len.lendee_Id',$id);
        $this->db->join('Business_tbl ', 'lendee_tbl.lendee_Id = Business_tbl.lendee_Id','INNER');
        $this->db->join('Loan_tbl ', 'lendee_tbl.lendee_Id = Loan_tbl.lendee_Id','INNER');
        
//        $this->db->where($condition);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
//           $this->db->where('$lendee_Id', $lendee_Id);
//   
//        $this->db->from('lendee_tbl');
//           $this->db->select('age');
//    
//        $query = $this->db->get();
//
//        if ($query- == 1) {
//            return $query->result();
//        } else {
//            return false;
//        }
    }

    public function getUserID($data) {

        $condition = "username =" . "'" . $data["username"] . "'";
        $this->db->select('lendee_Id');
        $this->db->from('lendee_tbl');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
?>

