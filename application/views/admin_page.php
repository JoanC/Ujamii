<html>
<head>
<!--<title>User Profile</title>-->

<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<meta charset="utf-8" />
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 
    <?php 
//    $username=$this->session->userdata('username');
//    var_dump($username);
//    if(!(isset($username) && $username)){
//              redirect('index/user_login_process/', 'refresh');
//        
//    } 
    ?>
    
<div class="container">

<?php if(isset($first))
{
    $firstname=$first;
    
}
 else
     { echo "No data sent";
    
}
    ?>

<!-- User Details - START -->
<div style="margin-left: -15px;"class="container">
    <div class="row">
   
        <div class="container" >
   
   
          <div class="panel panel-info">
            <div class="well details">
              <h3 style ="color:#262a62;" class="panel-title"><b><?php echo"Welcome ". $first?></b>
                    <div  class="col-md-5  toppad  pull-right col-md-offset-3 ">
                        <div>
<!--                            <a  href="#" >  Edit profile      </a>-->
                            

                        <a  id ="logout" href="<?php echo site_url('index/logoutuser');?>" > Logout</a></div>
       

      </div>
              </h3>
           
            </div>
            <div class="panel-body">
              <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img src="<?php echo base_url();?>images/profile.jpeg"  class="img-circle"> </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $userName?></td>
                      </tr>
                      <tr>
                        <td>Age:</td>
                        <td><?php echo $age?></td>
                      </tr>
                      <tr>
                        <td>Telephone</td>
                        <td><?php echo $telephone?></td>
                      </tr>
                   
                         
                        <tr>
                        <td>Address</td>
                        <td><?php echo $address?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td> <?php echo $email?></td>
                      </tr>
                      <tr>
                        <td>Loanstatus</td>
                        <td> <?php echo "pending"?></td>
                      </tr>
                      <tr>
                        <td>Rated</td>
                        <td> <?php echo 6*5 ?></td>
                      </tr>
                        
                     
                    </tbody>
                  </table>
                  
                    <a href="#" class="btn btn-primary">Edit Business details </a>
                 <a href="?php echo site_url('index/editPersonal');?>" class="btn btn-primary">Edit Personal Details</a>
                </div>
              </div>
            </div>
<!--                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>-->
    </div>
</div>


<script type="text/javascript">
jQuery(function ($) {
    $('#rate1').shieldRating({
        max: 7,
        step: 0.1,
        value: 6.3,
        markPreset: false
    });
    $('#rate2').shieldRating({
        max: 7,
        step: 0.1,
        value: 6,
        markPreset: false
    });
    $('#rate3').shieldRating({
        max: 7,
        step: 0.1,
        value: 3,
        markPreset: false
    });
    $('#rate4').shieldRating({
        max: 7,
        step: 0.1,
        value: 5,
        markPreset: false
    });
    $('#rate5').shieldRating({
        max: 7,
        step: 0.1,
        value: 5.7,
        markPreset: false
    });
});
</script>

<!-- User Details - END -->

</div>
</body>
</html>

