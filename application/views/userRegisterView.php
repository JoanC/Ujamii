
<html >
<head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<!--        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
   <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<style type="text/css">
 
.error_color{
color:#FF0000;

</style>
<script type="text/javascript">
 
function createXmlHttpObject(){
  var xmlhttp="";
   
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
   
  return xmlhttp;
}  
 
 
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
 
sendAjaxHttpRequest(xmlhttp,"http://localhost/Ujamii/index.php/ajaxValidation",elementName,elementValue,SpanTagId);
 
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
//xmlhttp.open("POST","http://localhost/Ujamii/index.php/userAdministration/ajaxValidation",true);
xmlhttp.open("POST","http://localhost/Ujamii/index.php/ajaxValidation",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", parameters.length);
xmlhttp.setRequestHeader("Connection", "close");
xmlhttp.send(parameters);
 
 
}

 
</script>


</head>
<body>
<?php
$this->load->helper('form');
$this->load->library('form_validation');
$this->load->helper('url');
 
 
$this->form_validation->set_error_delimiters('<div class="error_color">', '</div>');
 
echo form_open(base_url().'index/register',array('method'=>'post','class'=>'registration_form_div'));
?>
    
    <div class ="container" >
        <div id ="login">
            <form role ="form">
                <div class="col-md-5"></div>
            <div class="col-md-6">
                 <div class="well well-sm"><strong><span ></span>Sign up</strong></div>
<table>
  <tr>
    <td><label>Username </label>
    </td>
    <td><input type="text"  id="username" name="username" value="<?php echo set_value('username'); ?>" onchange="validateForm('username',this.value,'txtUsername')" />
    </td>
    <td><p><span id="txtUsername"> <?php echo form_error('username'); ?> </span></p></td>
  </tr>
  <tr>
    <td><label>First Name </label></td>
    <td><input type="text" id="firstName" name="firstName" value="<?php echo set_value('firstName'); ?>" onchange="validateForm('firstName',this.value,'txtFirstName')"/>
    </td>
    <td><p><span id="txtFirstName"> <?php echo form_error('firstName'); ?></span></p></td>
  </tr>
  <tr>
    <td><label>Last Name </label></td>
    <td><input type="text"  id="lastName" name="lastName" value="<?php echo set_value('lastName'); ?>" onchange="validateForm('lastName',this.value,'txtLastName')"/>
    </td>
    <td><p><span id="txtLastName"> <?php echo form_error('lastName'); ?> </span></p></td>
  </tr>
 
  <tr>
    <td><label>Age </label></td>
    <td><input type="text" name="age" value="<?php echo set_value('age'); ?>" onchange="validateForm('age',this.value,'txtAge')"/>
    </td>
    <td><p><span id="txtAge"> <?php echo form_error('age'); ?> </span></p></td>
  </tr>
  <tr>
    <td><label>Address </label></td>
    <td><input type="text" name="address" value="<?php echo set_value('address'); ?>" onchange="validateForm('address',this.value,'txtAddress')"/>
    </td>
    <td><p><span id="txtAddress"><?php echo form_error('address'); ?></span></p></td>
  </tr>
  <tr>
    <td><label>Email </label></td>
    <td><input type="text" name="email" value="<?php echo set_value('email'); ?>" onchange="validateForm('email',this.value,'txtEmail')"/>
    </td>
    <td><p><span id="txtEmail"><?php echo form_error('email'); ?></span></p></td>
  </tr>
  <tr>
    <td><label>Telephone </label></td>
    <td><input type="text" name="telephone" value="<?php echo set_value('telephone'); ?>" onchange="validateForm('telephone',this.value,'txtTelephone')" />
    </td>
    <td><p><span id="txtTelephone"><?php echo form_error('telephone'); ?> </span></p></td>
  </tr>
   <tr>
    <td><label>Password </label></td>
    <td><input id="password" type="password" name="password" value="<?php echo set_value('password'); ?>" />
    </td>
    <td><p><span id="txtPassword"><?php echo form_error('password'); ?></span></p></td>
  </tr>
  <tr>
    <td><label>password confirmation </label></td>
    <td><input type="password" id="passwordConfirmation" name="passwordConfirmation" value="<?php echo set_value('passwordConfirmation'); ?>" onchange="passwordValidation(this.value)"/>
    </td>
    <td><p><span id="txtPasswordConf"><?php echo form_error('passwordConfirmation'); ?></span></p></td>
  </tr>
</table>
   
<input type="submit" value="Submit" name="registerUser"  />
            </div>
 </form>
        </div>
</div>
    
    <?php
echo  form_close(); 
?>
</body>
</html>
