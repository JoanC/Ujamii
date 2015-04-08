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
function getLoans()
     {
    $this->db->select('lendee_tbl.firstName,Loan_tbl.loan_amount,Loan_tbl.payment_period,Loan_tbl.application_date,Loan_tbl.uploaded_file');
	$this->db->from('Loan_tbl');
	$this->db->join('lendee_tbl','lendee_tbl.lendee_Id=Loan_tbl.lendee_Id','inner');
	$query=$this->db->get();
          
//          $sql = 'SELECT firstName,bus_regId, business_name,business_category,business_rating FROM Business_tbl JOIN lendee_tbl ON Business_tbl.lendee_Id = lendee_tbl.lendee_Id';
//          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }


}

?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

