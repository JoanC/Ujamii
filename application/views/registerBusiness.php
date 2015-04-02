<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<div class="container">
    <div class="row">
    
        <form role="form" action="<?php echo site_url('lendeeProfile/registerBusiness'); ?>" method="post">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="well well-sm"><strong><span ></span>Business Registration</strong></div>
                <table>
                    
     <div class="form-group">
                    <label >Business Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="businessName" id="InputName" required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
        <div class="form-group">
                    <label >Business Location</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="businessLocation" id="InputName"  required>
                          <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>            
       <div class="form-group">
                    <label >Category</label>
                    <div class="input-group">
                        <select  class="form-control" name="businessCategory" id="InputName" >
                            <option value="creative">Creative</option>
                            <option value="service">Service</option>
                            <option value="juaKali">Jua Kali</option>
    
                        </select>
                        
                        <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
       
        
            <div class="form-group">
                    <label >Business Description</label>
                    <div class="input-group">
                        <textarea type="text" rows="4" cols="40" class="form-control" name="businessDescription" id="InputName"  required></textarea>
                        
                        <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
    
        
             <div class="form-group">
                     <label>Assets-worth</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="assetWorth" id="InputName"  required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
     <div class="form-group">
                    <label >Income (Per month)</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="currentIncome" id="InputName"  required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
       
<!--             <div style ="display:inline;">
                    <label >Business Name</label>
                    <div style ="display:inline;">
                        <input type="text"  name="business_name" id="InputName" placeholder="Enter business name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label >Business Location</label>
                    <div class="input-group">
                        <input type="text" name="business_location" id="InputName" placeholder="Enter Location of business" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label >Business Category</label>
                    <div class="input-group">
                        <input type="text"  name="business_category" id="InputName" placeholder="Enter business category" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label >Business Description</label>
                    <div class="input-group">
                        <input type="text"  name="business_description" id="InputName" placeholder="Enter business description" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                     <label>Business Assets-worth</label>
                    <div class="input-group">
                        <input type="text"  name="business_worth" id="InputName" placeholder="Enter the worth of business assets" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label >Current Income</label>
                    <div class="input-group">
                        <input type="text"  name="business_current_income" id="InputName" placeholder="Enter current income" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>-->
                </table>
                <input type="submit" name="submit"  value="Submit" >
            </div>
        </form>
        
    </div>

</div>
