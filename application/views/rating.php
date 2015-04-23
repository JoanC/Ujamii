<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
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
 
sendAjaxHttpRequest(xmlhttp,"http://localhost/mvc/index.php/userAdministration/ajaxValidation",elementName,elementValue,SpanTagId);
 
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

</head>
<body>
<?php
$this->load->helper('form');
$this->load->library('form_validation');
$this->load->helper('url');
 
$this->form_validation->set_error_delimiters('<div class="error_color">', '</div>');
 
echo form_open(base_url().'index/editUser',array('method'=>'post'));
?>
<table>

   
  <tr>
    <td><label>First Name </label></td>
    <td><input type="text" name="firstName" value="<?php if(isset($firstName)){ echo $firstName; }else{ echo set_value('firstName'); } ?>" onchange="validateForm('firstName',this.value,'txtFirstName')" />
    </td>
    <td><p><span id="txtFirstName"> <?php echo form_error('firstName'); ?> </span></p></td>
  </tr>
   
  <tr>
    <td><label>Last Name </label></td>
    <td><input type="text" name="lastName" value="<?php if(isset($lastName)){ echo $lastName; }else{ echo set_value('lastName'); } ?>" onchange="validateForm('lastName',this.value,'txtLastName')"  />
    </td>
    <td><p><span id="txtLastName"> <?php echo form_error('lastName'); ?> </span></p></td>
  </tr>
   
  
   
  <tr>
    <td><label>Age </label></td>
    <td><input type="text" name="age" value="<?php if(isset($age)){ echo $age; }else{ echo set_value('age'); } ?>" onchange="validateForm('age',this.value,'txtAge')" />
    </td>
    <td><p><span id="txtAge"> <?php echo form_error('age'); ?> </span></p></td>
  </tr>
   
  <tr>
    <td><label>Address </label></td>
    <td><input type="text" name="address" value="<?php if(isset($address)){ echo $address; }else{ echo set_value('address'); } ?>" onchange="validateForm('address',this.value,'txtAddress')" />
    </td>
    <td><p><span id="txtAddress"> <?php echo form_error('address'); ?> </span></p></td>
  </tr>
  <tr>
    <td><label>Email </label></td>
    <td><input type="text" name="email" value="<?php if(isset($email)){ echo $email; }else{ echo set_value('email'); } ?>" onchange="validateForm('email',this.value,'txtEmail')" />
    </td>
    <td><p><span id="txtEmail"> <?php echo form_error('email'); ?> </span></p></td>
  </tr>
   
  <tr>
    <td><label>Telephone </label></td>
    <td><input type="text" name="telephone" value="<?php if(isset($telephone)){ echo $telephone; }else{ echo set_value('telephone'); } ?>" onchange="validateForm('telephone',this.value,'txtTelephone')" />
    </td>
    <td><p><span id="txtTelephone"> <?php echo form_error('telephone'); ?> </span></p></td>
  </tr>
     <tr>
    <td><label>Gender </label></td>
    <td><input type="text" name="telephone" value="<?php if(isset($telephone)){ echo $telephone; }else{ echo set_value('telephone'); } ?>" onchange="validateForm('telephone',this.value,'txtTelephone')" />
    </td>
    <td><p><span id="txtTelephone"> <?php echo form_error('telephone'); ?> </span></p></td>
  </tr>
     <tr>
    <td><label>Marital status </label></td>
    <td><input type="text" name="telephone" value="<?php if(isset($telephone)){ echo $telephone; }else{ echo set_value('telephone'); } ?>" onchange="validateForm('telephone',this.value,'txtTelephone')" />
    </td>
    <td><p><span id="txtTelephone"> <?php echo form_error('telephone'); ?> </span></p></td>
  </tr>
     <tr>
    <td><label>Number of dependents </label></td>
    <td><input type="text" name="telephone" value="<?php if(isset($telephone)){ echo $telephone; }else{ echo set_value('telephone'); } ?>" onchange="validateForm('telephone',this.value,'txtTelephone')" />
    </td>
    <td><p><span id="txtTelephone"> <?php echo form_error('telephone'); ?> </span></p></td>
  </tr>
     <tr>
    <td><label>Housing</label></td>
    <td><input type="text" name="telephone" value="<?php if(isset($telephone)){ echo $telephone; }else{ echo set_value('telephone'); } ?>" onchange="validateForm('telephone',this.value,'txtTelephone')" />
    </td>
    <td><p><span id="txtTelephone"> <?php echo form_error('telephone'); ?> </span></p></td>
  </tr>
   
</table>
<input type="submit" value="Save"  class="registration_textfield" />
<?php
echo  form_close(); 
?>
</body>
</html>