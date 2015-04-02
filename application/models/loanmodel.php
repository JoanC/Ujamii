<?php

Class Loanmodel extends CI_Model {
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();    
 
    }

// Insert registration data in database
public function applyLoan($loandata) {




// Query to insert data in database
$this->db->insert('Loan_tbl', $loandata);
if ($this->db->affected_rows() > 0) {
return true;


}
else{
  return false;  
}
}


}

?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

