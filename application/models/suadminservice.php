<?php
class Suadminservice extends CI_Model {
 
 
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();    
 
    }


function getWeights($weightData){
         
        $query = $this->db->get('weights');
     
        $selectedData="";
         
        foreach ($query->result() as $row){
 
         $selectedData=array("age"=>$row->age,
             "customer_type"=>$row->customer_type,
             "housing"=>$row->housing,
             "gender"=>$row->gender,
             "marital_status"=>$row->marital_status,
             "dependents"=>$row->dependents,
             "purpose"=>$row->purpose,
             "loan_amount"=>$row->loan_amount,
             "business_type"=>$row->business_type,
             "income"=>$row->income,
             "asset_worth"=>$row->asset_worth,
             "num_employees"=>$row->num_employees,
             "business_existence"=>$row->business_existence);
         
         
        }
         
        return $selectedData;
         
    } 
     function editweightDetails($editweightData){
     

 
    //    $this->db->where('lendee_Id', $this->session->userdata('id'));
       $updatedStatus=$this->db->update('weights',array('age'=>$editweightData['age'] ,'customer_type'=>$editweightData['customer_type'],'housing'=>$editweightData['housing'] ,'gender'=>$editweightData['gender'] ,'marital_status'=>$editweightData['marital_status'] ,'dependents'=>$editweightData['dependents'] ,'purpose'=>$editweightData['purpose'] ,'loan_amount'=>$editweightData['loan_amount'],'business_type'=>$editweightData['business_type'],'income'=>$editweightData['income'],'business_existence'=>$editweightData['business_existence'])); 
        
       if($updatedStatus){
        
       return true;
       }
       else{
        
       return false;
        
       }
}
}