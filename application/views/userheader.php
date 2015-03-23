
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ujamii</title>
	
	<!-- core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
  
</head><!--/head-->

<body class="homepage">

    <header id="header" class="container">
       

        <nav class="navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php"><img src="<?php echo base_url();?>images/ujamii.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url('index');?>">Home</a></li>
                        <li><a href="<?php echo site_url('index');?>">My rating </a></li>
                
                        <li><a href="<?php echo site_url('lendeeProfile/registerBusiness');?>">My business</a></li>
                       
             
                         <li><a href="<?php echo site_url('lendeeProfile/loanApplication');?>">Apply loan</a></li> 
                         <li><a href="<?php echo site_url('index/logoutuser');?>">Logout</a></li>
                                            
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->




<script src="<?php echo base_url();?>js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url();?>js/main.js"></script>
    <script src="<?php echo base_url();?>js/wow.min.js"></script>