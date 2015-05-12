<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ujamii Admin</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url(); ?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" >

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;background-color: #fff;">
            <div class="navbar-header" style="margin-bottom: 0;background-color: #fff;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>application/views/admin/superadmin.php">Ujamii Admin </a>
            </div>
            <!-- /.navbar-header -->
           
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
<!--                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>-->
<!--                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>-->
<!--                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>-->
<!--                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>-->
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
          
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                             
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Members
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
<!--                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>-->
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Loan application
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                       
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('index/logoutuser');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/suAdmin');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('admin/showBusinessOwners');?>">Business owners</a>
                                </li>
                                <li>
                                    <a href="#">Investors</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/loadLoans');?>"><i class="fa fa-table fa-fw"></i> Loans</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/loadBusinesses');?>"><i class="fa fa-edit fa-fw"></i> Businesses</a>
                        </li>
                         <li>
                                <a href="<?php echo site_url('admin/editWeights'); ?>"><i class="fa fa-table fa-fw"></i> Adjust weights</a>
                            </li>
                      
                        
                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Adjust weights for ratings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                   
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Adjust Weights
                            <div class="pull-right">
<!--                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>-->
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-lg-4">
                                    
                                          
 <form role="form" action="<?php echo site_url('admin/adjustWeights'); ?>" method="post">
    
       


                    <label class="control-label">Age</label>
                    <?php echo form_error('age'); ?>
                    <input  type="text" name = "age" value="<?php if(isset($age)){ echo $age; }else{ echo set_value('age'); } ?>"required="required" class="form-control"  />
              
 
              <div class="form-group">
                    <label class="control-label">Customer type </label>
                    <?php echo form_error('customer_type'); ?>
                    <input  type="text" name = "customer_type" value="<?php if(isset($customer_type)){ echo $customer_type; }else{ echo set_value('customer_type'); } ?>"required="required" class="form-control"  />
                </div>
   <div class="form-group">
                    <label class="control-label">Housing </label>
                    <?php echo form_error('housing'); ?>
                    <input  type="text" name = "housing" value="<?php if(isset($housing)){ echo $housing; }else{ echo set_value('housing'); } ?>"required="required" class="form-control"  />
                </div>
   
 
   
  
   
  <div class="form-group">
    <label class="control-label">Gender </label>
    <?php echo form_error('gender'); ?>
    <input type="text" name="gender" value="<?php if(isset($gender)){ echo $gender; }else{ echo set_value('gender'); } ?>" required="required" class="form-control" />
     </div>
           
    <div class="form-group">
    <label class="control-label">Marital Status </label>
    <?php echo form_error('marital_status'); ?>
    <input type="text" name="marital_status" value="<?php if(isset($marital_status)){ echo $marital_status; }else{ echo set_value('marital_status'); } ?>" required="required" class="form-control" />
     </div>
         <div class="form-group">
    <label class="control-label">Dependents </label>
    <?php echo form_error('dependents'); ?>
    <input type="text" name="dependents" value="<?php if(isset($dependents)){ echo $dependents; }else{ echo set_value('dependents'); } ?>" required="required" class="form-control" />
     </div>
             <div class="form-group">
    <label class="control-label">Loan purpose </label>
    <?php echo form_error('purpose'); ?>
    <input type="text" name="purpose" value="<?php if(isset($purpose)){ echo $purpose; }else{ echo set_value('purpose'); } ?>" required="required" class="form-control" />
     </div>
             <div class="form-group">
    <label class="control-label">Marital Status </label>
    <?php echo form_error('loan_amount'); ?>
    <input type="text" name="loan_amount" value="<?php if(isset($loan_amount)){ echo $loan_amount; }else{ echo set_value('loan_amount'); } ?>" required="required" class="form-control" />
     </div>
             <div class="form-group">
    <label class="control-label">Business type </label>
    <?php echo form_error('business_type'); ?>
    <input type="text" name="business_type" value="<?php if(isset($business_type)){ echo $business_type; }else{ echo set_value('business_type'); } ?>" required="required" class="form-control" />
     </div>
             <div class="form-group">
    <label class="control-label">Business monthly income </label>
    <?php echo form_error('income'); ?>
    <input type="text" name="income" value="<?php if(isset($income)){ echo $income; }else{ echo set_value('income'); } ?>" required="required" class="form-control" />
     </div>
             <div class="form-group">
    <label class="control-label">Assets worth </label>
    <?php echo form_error('asset_worth'); ?>
    <input type="text" name="asset_worth" value="<?php if(isset($asset_worth)){ echo $asset_worth; }else{ echo set_value('asset_worth'); } ?>" required="required" class="form-control" />
     </div>
             <div class="form-group">
    <label class="control-label">Number of employees </label>
    <?php echo form_error('num_employees'); ?>
    <input type="text" name="num_employees" value="<?php if(isset($num_employees)){ echo $num_employees; }else{ echo set_value('num_employees'); } ?>" required="required" class="form-control" />
     </div>
   <div class="form-group">
    <label class="control-label">Existence of Business </label>
    <?php echo form_error('business_existence'); ?>
    <input type="text" name="business_existence" value="<?php if(isset($business_existence)){ echo $business_existence; }else{ echo set_value('business_existence'); } ?>" required="required" class="form-control" />
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
                                   
 </form>
                                        
                                    
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                               
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Registrations
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
<!--                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>-->
                               
                              
                                
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Loan Application
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                    
                    
                    
                  
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="<?php echo base_url(); ?>js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="<?php echo base_url(); ?>js/demo/dashboard-demo.js"></script>

</body>

</html>

