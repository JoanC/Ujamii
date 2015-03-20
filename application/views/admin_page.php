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
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <div class="well details">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2 style="text-decoration:underline;"><?php
                         echo "<b id='welcome'>" . $firstname . " </b>";

                            ?></h2>
                        <p><strong>Type: </strong>first time </p>
                        <p><strong>Business Name: </strong>Shoka shiki</p>
                        <p><strong>Business type: </strong>service </p>
                        <p class="text-center skills"><strong>weights</strong></p>
                        <div class="skillLine"><div class="skill pull-left">personal</div><div class="rating" id="rate1"></div></div>
                        <div class="skillLine"><div class="skill pull-left">business</div><div class="rating" id="rate2"></div></div>
                       
                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-1 text-center">                        
                        <figure>
                            <span class="fa fa-file-text-o" style="font-size:127px; padding-top: 20px;"></span>                                 
                            <span style="font-size:47px; padding-top: 20px;">Avg.</span>                                 
                            <span class="avg">6.2</span>           
                        </figure>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<!--<style>
body {
    font-family: "Segoe UI", 'sans-serif';
}

.avg {
    font-size:77px; 
    padding-top: 20px;
    color:#5CB85C;
}

.details {
    min-height: 355px;
    display: inline-block;
}

.rating {
    padding-left:40px;
}

.skillLine {    
    display:inline-block;
    width:100%;
    padding: 3px 4px;    
}

.skills {
    text-decoration:underline;
}

div.skill {
    background: #F58723;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    padding: 3px 4px;    
    width:70px;
}
</style>-->

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<!--<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>-->

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

