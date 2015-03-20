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
      $age=$user->getAge();
      $password=$user->getPassword();
      $address=$user->getAddress();
 
       
       $insertStatus=$this->db->insert('user',array('username'=>$username ,'firstName'=>$firstName ,'lastName'=>$lastName ,'email'=>$email ,'age'=>$age ,'password'=>$password ,'address'=>$address      ,'telephone'=>$telephone)); 
        
       if($insertStatus){
        
       return true;
       }
       else{
        
       return false;
        
       }
     
    }//createNewUser
     
     
     
     
    function editUserDetails($user){
     
     
      $username=$user->getUserName();
      $firstName=$user->getFirstName();
      $lastName=$user->getLastName();
      $email=$user->getEmail();
      $telephone=$user->getTelephone();
      $age=$user->getAge();
      $password=$user->getPassword();
      $address=$user->getAddress();
 
        $this->db->where('userID', $user->getUserID());
       $updatedStatus=$this->db->update('user',array('username'=>$username ,'firstName'=>$firstName ,'lastName'=>$lastName ,'email'=>$email ,'age'=>$age ,'password'=>$password ,'address'=>$address,'telephone'=>$telephone)); 
        
       if($updatedStatus){
        
       return true;
       }
       else{
        
       return false;
        
       }
     
     
     
     
    }//editUserDetails
     
     
     
     
    function getAllRegisteredUsersIDs(){
         
    $this->db->select('userID');
    $query = $this->db->get('user');
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
         
        $query = $this->db->get_where('user', array('userID' => $user->getUserID()));
     
        $selectedData="";
         
        foreach ($query->result() as $row){
 
         $selectedData=array("username"=>$row->username,"firstName"=>$row->firstName,"lastName"=>$row->lastName,"password"=>$row->password,"age"=>$row->age,"telephone"=>$row->telephone,"address"=>$row->address,"email"=>$row->email,"userID"=>$row->userID);
         
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
  
