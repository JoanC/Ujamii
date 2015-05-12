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
    $this->db->select('lendee_tbl.firstName,lendee_tbl.lastName,lendee_tbl.rating,Business_tbl.business_name,Loan_tbl.loan_amount,Loan_tbl.payment_period,Loan_tbl.application_date,Loan_tbl.uploaded_file');
   $this->db->order_by("lendee_tbl.rating","desc");	
    $this->db->from('Loan_tbl');
	$this->db->join('lendee_tbl','lendee_tbl.lendee_Id=Loan_tbl.lendee_Id','inner');
        $this->db->join('Business_tbl ', 'lendee_tbl.lendee_Id = Business_tbl.lendee_Id','INNER');
        
	$query=$this->db->get();
          
//          $sql = 'SELECT firstName,bus_regId, business_name,business_category,business_rating FROM Business_tbl JOIN lendee_tbl ON Business_tbl.lendee_Id = lendee_tbl.lendee_Id';
//          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     function getLoanStatus($id){
       $condition = "lendee_Id =" . "'" . $id . "'";
        $this->db->select('status');
        $this->db->from('Loan_tbl');
        $this->db->where($condition);
        $this->db->limit(1);


        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
         
         
     }
     public function getWeights(){
         
         $this->db->select('*');
         $this->db->from('weights');
         $query=$this->db->get();
         return $query->result();
         
     }

}

?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

