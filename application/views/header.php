
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
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <h2 style="color: #fff; padding-left: 20px">UJAMII</h2>
                        
                    </div>
                    
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                
                            </ul>
                           <!-- <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>-->
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

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
                        <li><a href="<?php echo site_url('index/about');?>">About </a></li>
                     
                
                        <li><a href="<?php echo site_url('index/portfolio');?>">Portfolios</a></li>
                           <?php if($this->session->userdata('username')):?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="<?php echo site_url('index/userprofile');?>"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('firstName');?></a>
                                </li>
                               
                                
                                <li><a href="<?php echo site_url('lendeeProfile/registerBusiness');?>"><i class="fa fa-gear fa-fw"></i> Register businesses</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('index/logoutuser');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                    <!-- /.dropdown-user -->
                        </li>
                        <?php else:?><li><a href="<?php echo site_url('index/user_login_process');?>">Login</a></li> 
                            <li><a href="<?php echo site_url('index/register');?>">Signup</a></li> 
                            
                            <?php endif;?>
             
                        
                         
                                            
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->


