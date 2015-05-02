<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<style type="text/css">
 
.error_color{
color:#FF0000;
}
</style>
<script type="text/javascript">
 

 
 
function sendAjaxHttpRequest(xmlhttp,url,parameterName,parameterValue){
 
var parameters=parameterName+"="+parameterValue+"&isAjax=true";
xmlhttp.open("POST",url,true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", parameters.length);
xmlhttp.setRequestHeader("Connection", "close");
xmlhttp.send(parameters);
 
}
 
 
function validateForm(elementName,elementValue,SpanTagId)
{
 
if (elementValue.length==0)
  {
  document.getElementById(SpanTagId).innerHTML="";
  return;
  }
 
xmlhttp=createXmlHttpObject();
 
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(SpanTagId).innerHTML=xmlhttp.responseText;
    }
  }
 
sendAjaxHttpRequest(xmlhttp,"http://localhost/Ujamii/index.php/userAdministration/ajaxValidation",elementName,elementValue,SpanTagId);
 
}//validateUsername
 
 
 
function passwordValidation(passwordConf){
 
var password=(document.getElementById("password")).value;
 
 
 
if (passwordConf.length==0)
  {
  document.getElementById("txtPasswordConf").innerHTML="";
  return;
  }
 
xmlhttp=createXmlHttpObject();
 
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtPasswordConf").innerHTML=xmlhttp.responseText;
    }
  }
 
var parameters="password="+password+"&passwordConf="+passwordConf+"&isAjax=true";

xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", parameters.length);
xmlhttp.setRequestHeader("Connection", "close");
xmlhttp.send(parameters);
 
 
}
 
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<style>
    .error{
        color:red;
    }
</style>

    <div class="container">
 <form role="form" action="<?php echo site_url('index/editUser'); ?>" method="post">
         <div class="col-md-3"></div>
        <div class="col-md-6">

<div class="form-group">
                    <label class="control-label">Username </label>
                    <?php echo form_error('username'); ?>
                    <input  type="text" name = "username" value="<?php if(isset($username)){ echo $username; }else{ echo set_value('username'); } ?>"required="required" class="form-control"  />
                </div>
 
              <div class="form-group">
                    <label class="control-label">First Name </label>
                    <?php echo form_error('firstName'); ?>
                    <input  type="text" name = "firstName" value="<?php if(isset($firstName)){ echo $firstName; }else{ echo set_value('firstName'); } ?>"required="required" class="form-control"  />
                </div>
   <div class="form-group">
                    <label class="control-label">Last Name </label>
                    <?php echo form_error('lastName'); ?>
                    <input  type="text" name = "lastName" value="<?php if(isset($lastName)){ echo $lastName; }else{ echo set_value('lastName'); } ?>"required="required" class="form-control"  />
                </div>
   
 
   
  
   
  <div class="form-group">
    <label class="control-label">Age </label>
    <?php echo form_error('age'); ?>
    <input type="text" name="age" value="<?php if(isset($age)){ echo $age; }else{ echo set_value('age'); } ?>" required="required" class="form-control" />
     </div>
    
  
      <div class="form-group">
                   
                    <table>
                         <label class="control-label">Gender</label><br>
                        
                    <tr><td>Female  </td><td><input   class="form-control"  type="radio" name="gender" value="<?php if(isset($gender)){ echo $gender; }else{ echo set_value('female'); } ?>" /> </td></tr>
                    <tr><td>Male  </td><td><input   class="form-control"  type="radio" name="gender" value="<?php if(isset($gender)){ echo $gender; }else{ echo set_value('male'); } ?>" /> </td></tr>
                    </table>
                </div>
            <div class="form-group">
                   
                    <table>
                         <label class="control-label">Marital Status</label><br>
                           
                    <tr><td>Single  </td><td><input   class="form-control"  type="radio" name="maritalStatus" value="<?php if(isset($maritalStatus)){ echo $maritalStatus; }else{ echo set_value('single'); } ?>" /> </td></tr>
                    <tr><td>Married  </td><td><input   class="form-control"  type="radio" name="maritalStatus" value="<?php if(isset($maritalStatus)){ echo $maritalStatus; }else{ echo set_value('married'); } ?>" /> </td></tr>
                    <tr><td>Divorced </td><td><input   class="form-control"  type="radio" name="maritalStatus" value="<?php if(isset($maritalStatus)){ echo $maritalStatus; }else{ echo set_value('divorced'); } ?>" /> </td></tr>

                    </table>
                </div>
              
              
                 <div class="form-group">
                    <label class="control-label">Number of dependents</label>
                    <?php echo form_error('dependents'); ?>
                    <input  type="text" name = "dependents" value="<?php if(isset($dependents)){ echo $dependents; }else{ echo set_value('Free'); } ?>"required="required" class="form-control"  />
                </div>
    
                 <div class="form-group">
                    <label class="control-label">Housing</label>
                    
                     <select  class="form-control" name="housing" id="InputName" >
                            <option value="<?php if(isset($housing)){ echo $housing; }else{ echo set_value('Free'); } ?>">Free</option>
                            <option value="<?php if(isset($housing)){ echo $housing; }else{ echo set_value('Rent'); } ?>">Rent</option>
                            <option value="<?php if(isset($housing)){ echo $housing; }else{ echo set_value('Own'); } ?>">Own</option>
    
                        </select>
                    
                </div>
   
 <div class="form-group">
    <label class="control-label">Address </label>
    <?php echo form_error('address'); ?>
    <input type="text" name="address" value="<?php if(isset($address)){ echo $address; }else{ echo set_value('address'); } ?>" required="required" class="form-control" />
    
   
    </div>
    <div class="form-group">
  
    <label class="control-label">Email </label>
    <?php echo form_error('email'); ?>
    <input type="text" name="email" value="<?php if(isset($email)){ echo $email; }else{ echo set_value('email'); } ?>" required="required" class="form-control"/>
    
   
  
    </div>
   
  <div class="form-group">
    <label class="control-label">Telephone </label>
    <?php echo form_error('telephone'); ?>
    <input type="text" name="telephone" value="<?php if(isset($telephone)){ echo $telephone; }else{ echo set_value('telephone'); } ?>" required="required" class="form-control"/>
    
    
  </div>
    
   

    <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <!--                <h3> Step 3</h3>-->
                        <input type="submit" name="submit"  value="Save" >
                        <!--                <button class="btn btn-success btn-lg pull-right" type="submit">Rate!</button>-->
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
