<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<style>
    .error{
        color:red;
    }
</style>
<div class="container">
    <div class="row">
    
        <form role="form" action="<?php echo site_url('lendeeProfile/registerBusiness'); ?>" method="post">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="well well-sm"><strong><span ></span>Business Registration</strong></div>
                <table>
                    
     <div class="form-group">
                    
                    <label >Business Name</label>
                    <?php echo form_error('businessName'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="businessName" id="InputName"  value=" <?php echo set_value('businessName'); ?>"required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
        <div class="form-group">
                     
                    <label >Business Location</label>
                    <?php echo form_error('businessLocation'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="businessLocation" id="InputName"   value=" <?php echo set_value('businessLocation'); ?>"required>
                          <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>            
       <div class="form-group">
            
                    <label >Category</label>
                    <?php echo form_error('businessCategory'); ?>
                    <div class="input-group">
                        <select  class="form-control" name="businessCategory" id="InputName" value=" <?php echo set_value('businessCategory'); ?>" >
                            <option value="creative">Creative</option>
                            <option value="service">Service</option>
                            <option value="juaKali">Jua Kali</option>
    
                        </select>
                        
                        <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
       
        
            <div class="form-group">
           
                    <label >Business Description</label>
                     <?php echo form_error('businessDescription'); ?>
                    <div class="input-group">
                        <textarea type="text" rows="4" cols="40" class="form-control" name="businessDescription" id="InputName" value=" <?php echo set_value('businessDescription'); ?>" required></textarea>
                        
                        <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
    
        
             <div class="form-group">
                 
                     <label>Assets-worth</label>
                     <?php echo form_error('assetWorth'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="assetWorth" id="InputName" value=" <?php echo set_value('assetWorth'); ?>"   required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
             <div class="form-group">
                      
                    <label >Income (Per month)</label>
                     <?php echo form_error('currentIncome'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="currentIncome" id="InputName"  value=" <?php echo set_value('currentIncome'); ?>"  required>
                           <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
       

                </table>
                <input type="submit" name="submit"  value="Submit" >
            </div>
        </form>
        
    </div>

</div>
