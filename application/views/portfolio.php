<!DOCTYPE html>
<html lang="en">

<body >

    
    <section id="portfolio" class="container">
        <div class="container">
            
        

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Businesses</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Creative</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".html">Service</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">Jua Kali</a></li>
            </ul><!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
            


                      
                    <?php for ($i = 0; $i < count($bizdetails); ++$i) { ?>
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo base_url();?>images/portfolio/recent/grocery.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#"><?php echo $bizdetails[$i]->business_name; ?></a></h3>
                                    <p><?php echo $bizdetails[$i]->business_description; ?> rating :7.8</p>
                                    <a class="preview" href="<?php echo base_url();?>images/portfolio/recent/grocery.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
                   <?php } ?>
                  
                  
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
    

   <section id="bottom" class="container">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            
               
                

             

            </div>
     
    </section><!--/#bottom-->

   
</body>
</html>
