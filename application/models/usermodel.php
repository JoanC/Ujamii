<?php
class UserModel extends CI_Model {
 
     var $lendee_Id='';
     var $username = '';
     var $password = '';
     var $email = '';
     var $firstName = '';
     var $address = '';
     var $age = '';
     var $telephone = '';
     
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
     
    function setUserID($userIDprovided){
     
        $this->lendee_Id=$userIDprovided;
    }
     
    function getUserID(){
     
    return $this->lendee_Id;
    }
     
    function getUserName(){
     
    return $this->username;
    }
     
    function setUserName($usernameProvided){
     
    $this->username=$usernameProvided;
     
    }
     
     
    function getFirstName(){
     
    return $this->firstName;
    }
     
    function setFirstName($fisrtNameProvided){
     
    $this->firstName=$fisrtNameProvided;
     
    }
     
     
    function getLastName(){
     
    return $this->lastName;
    }
             
    function setLastName($lastNameProvided){
     
     $this->lastName=$lastNameProvided;
     
    }
     
     
    function getEmail(){
     
    return $this->email;
    }
     
    function setEmail($emailProvided){
     
    $this->email=$emailProvided;
     
    }    
     
     
    function getGender(){
     
    return $this->gender;
    }
     
    function setGender($genderProvided){
     
    $this->gender=$genderProvided;
     
    }
     
     
    function getTelephone(){
     
    return $this->telephone;
    }
     
    function setTelephone($telephoneProvided){
     
    $this->telephone=$telephoneProvided;
     
    }
     
     
    function getAddress(){
     
    return $this->address;
    }
     
    function setAddress($addressProvided){
     
    $this->address=$addressProvided;
     
    }
     
 
    function getPassword(){
      
     
    return md5($this->password);
    }
     
    function setPassword($passwordProvided){
     
    $this->password=$passwordProvided;
     
    }
     function getMaritalStatus(){
     
    return $this->maritalStatus;
    }
     
    function setMaritalStatus($maritalStatusProvided){
     
    $this->maritalStatus=$maritalStatusProvided;
     
    }
     
     function getDependents(){
     
    return $this->No_of_dependents;
    }
     
    function setDependents($dependentsProvided){
     
    $this->No_of_dependents=$dependentsProvided;
     
    }
    
    function getHousing(){
     
    return $this->Housing;
    }
     
    function setHousing($housingProvided){
     
    $this->Housing=$housingProvided;
     
    }
         
}//class
         
?>    
   
