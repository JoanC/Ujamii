<?php
class UserService extends CI_Model {
 
 
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();    
 
    }
     
     
     function createNewUser($user){
         
             
      $username=$user->getUserName();
      $firstName=$user->getFirstName();
      $lastName=$user->getLastName();
      $email=$user->getEmail();
      $telephone=$user->getTelephone();
      $gender=$user->getGender();
      $password=$user->getPassword();
      $address=$user->getAddress();
        
      //check if username exists
      
      $condition = "username =" . "'" . $username . "'";
      $this->db->select('*');
      $this->db->from('lendee_tbl');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      
      if ($query->num_rows() == 0) {

        // Query to insert data in database
        $this->db->insert('lendee_tbl',array('username'=>$username ,'firstName'=>$firstName ,'lastName'=>$lastName ,'email'=>$email ,'gender'=>$gender ,'password'=>$password ,'address'=>$address      ,'telephone'=>$telephone)); 
           if ($this->db->affected_rows() > 0) {
             return true;
           }
       }  
       else {
             return false;
            }
       
     
     
    }//createNewUser
     
        public function updateRating($rating){
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
       $updatedStatus=$this->db->update('lendee_tbl',array('rating'=>$rating)); 
        
       if($updatedStatus){
        
       return true;
       }
       else{
        
       return false;
        
       }
        
    }
     
     
    function editUserDetails($edituserData){
     
//     
//      $username=$user->getUserName();
//      $firstName=$user->getFirstName();
//      $lastName=$user->getLastName();
//      $email=$user->getEmail();
//      $telephone=$user->getTelephone();
//      $gender=$user->getGender();
//      $maritalStatus=$user->getMaritalStatus();
//      $dependents=$user->getDependents();
//      $housing=$user->getHousing();
//      $password=$user->getPassword();
//      $address=$user->getAddress();
 
        $this->db->where('lendee_Id', $this->session->userdata('id'));
       $updatedStatus=$this->db->update('lendee_tbl',array('firstName'=>$edituserData['firstName'] ,'lastName'=>$edituserData['lastName'],'email'=>$edituserData['email'] ,'gender'=>$edituserData['gender'] ,'maritalStatus'=>$edituserData['maritalStatus'] ,'No_of_dependents'=>$edituserData['dependents'] ,'Housing'=>$edituserData['housing'] ,'address'=>$edituserData['address'],'telephone'=>$edituserData['telephone'])); 
        
       if($updatedStatus){
        
       return true;
       }
       else{
        
       return false;
        
       }
     
     
     
     
    }//editUserDetails
     function addRating($ratingdata){
        $this->db->set('lendee.age', $ratingdata['age']);
        $this->db->set('lendee.maritalStatus', $ratingdata['maritalStatus']);
        $this->db->set('lendee.No_of_dependents', $ratingdata['No_of_dependents']);
        $this->db->set('lendee.Housing', $ratingdata['Housing']);
        $this->db->set('business.no_ofEmployees', $ratingdata['no_ofEmployees']);
         $this->db->set('business.business_existence', $ratingdata['business_existence']);
         
        $this->db->where('lendee.lendee_Id', $ratingdata['lendee_Id']);
        $this->db->where('lendee.lendee_Id = business.lendee_Id');
       $query= $this->db->update('lendee_tbl as lendee, Business_tbl as business');
        if ($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        
       
     }
     
     
     
    function getAllRegisteredUsersIDs(){
         
    $this->db->select('lendee_Id');
    $query = $this->db->get('lendee_tbl');
    $selectedDataArray=array();
     
    $i=0;
     
    foreach ($query->result() as $row){
     
    $selectedDataArray[$i]=$row->userID;
    $i++;
    }
     
     return $selectedDataArray;
     
    }//getAllRegisteredUsersIDs
     
     
     
     
     
    function removeRegisteredUser($user){
         
    $this->db->where('userID', $user->getUserID());
    $this->db->delete('user'); 
     
    }//removeRegisteredUser
     
     
     
     
    function getSelectedUserDetails($user){
         
        $query = $this->db->get_where('lendee_tbl', array('lendee_Id' => $this->session->userdata('id')));
     
        $selectedData="";
         
        foreach ($query->result() as $row){
 
         $selectedData=array("username"=>$row->username,"firstName"=>$row->firstName,"lastName"=>$row->lastName,"password"=>$row->password,"gender"=>$row->gender,"housing"=>$row->Housing,"age"=>$row->age,"maritalStatus"=>$row->maritalStatus,"dependents"=>$row->No_of_dependents,"telephone"=>$row->telephone,"address"=>$row->address,"email"=>$row->email,"userID"=>$row->lendee_Id);
         
        }
         
        return $selectedData;
         
    }//getSelectedUserDetails
     
     
     
    function isUserNamealreadyRegisterd($user){
         
    $username=$user->getUserName();
     
    $query = $this->db->get_where('user', array('username' => $username));
     
    if($query->num_rows()==0){
     
    return false;
     
    }
    else{
     
    return  true;
    }
       
    }//function
     
     
   }//class
     
     
     
?>
  
