<html>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div  class="container">
<div class="row">
<!--<h2>Login Form</h2>-->
<?php echo form_open('index/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>  <div class="col-md-3"></div>
            <div class="col-md-6">
                 <div class="well well-sm"><strong><span ></span>Login</strong></div>
                 <table>
                 <div class="form-group">
                    <label >UserName</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="InputName" required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
<div class="form-group">
                    <label >Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="InputName" placeholder="**********" required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
                 </table>
<input type="submit" value=" Login " name="submit"/>
<a href="<?php echo site_url('index/register');?>">To SignUp Click Here</a></div>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>

