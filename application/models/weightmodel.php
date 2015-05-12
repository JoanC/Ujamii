<?php
class Weightmodel extends CI_Model {
 
     var $age='';
     var $customer_type = '';
     var $housing = '';
     var $gender = '';
     var $marital_status = '';
     var $dependents = '';
     var $purpose = '';
     var $loan_amount = '';
     var $business_type = '';
     var $income = '';
     var $asset_worth = '';
     var $num_employees = '';
     var $business_existence = '';
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
 
     
    function getAge(){
     
    return $this->age;
    }
     
    function setAge($ageProvided){
     
    $this->age=$ageProvided;
     
    }
     
     
    function getCustomertype(){
     
    return $this->customer_type;
    }
     
    function setCustomertype($customertypeProvided){
     
    $this->customer_type=$customertypeProvided;
     
    }
     
     
    function getHousing(){
     
    return $this->housing;
    }
             
    function setLastName($housingProvided){
     
     $this->housing=$housingProvided;
     
    }
     
     
    
     
     
    function getGender(){
     
    return $this->gender;
    }
     
    function setGender($genderProvided){
     
    $this->gender=$genderProvided;
     
    }
     function getMaritalStatus(){
     
    return $this->marital_status;
    }
     
    function setMaritalStatus($maritalStatusProvided){
     
    $this->marital_status=$maritalStatusProvided;
     
    }
     
     function getDependents(){
     
    return $this->dependents;
    }
     
    function setDependents($dependentsProvided){
     
    $this->dependents=$dependentsProvided;
     
    }
      function getPurpose(){
     
    return $this->purpose;
    }
     
    function setPurpose($purposeProvided){
     
    $this->purpose=$purposeProvided;
     
    }
      
    function getLoanamount(){
     
    return $this->loan_amount;
    }
     
    function setLoanamount($loanamountProvided){
     
    $this->loan_amount=$loanamountProvidedProvided;
     
    }
      function getBusinesstype(){
     
    return $this->business_type;
    }
     
    function setBusinesstype($businesstypeProvided){
     
    $this->business_type=$businesstypeProvided;
     
    }
      function getIncome(){
     
    return $this->income;
    }
     
    function setIncome($incomeProvided){
     
    $this->income=$incomeProvided;
     
    }
      function getAssetworth(){
     
    return $this->asset_worth;
    }
     
    function setAssetworth($assetworthProvided){
     
    $this->asset_worth=$assetworthProvided;
     
    }
      function getEmployees(){
     
    return $this->num_employees;
    }
     
    function setEmployees($employeesProvided){
     
    $this->num_employees=$employeesProvided;
     
    }
      function getBusinessexistence(){
     
    return $this->business_existence;
    }
     
    function setBusinessexistence($busexistenceProvided){
     
    $this->business_existence=$busexistenceProvided;
     
    }
    
         
}//class
         
    
   


