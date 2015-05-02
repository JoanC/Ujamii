<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script>
    $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'}).val()
    });
</script>
<style>
    .error{
        color:red;
    }
</style>
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<div class="container">
    <div class="row">
        <?php echo form_open_multipart('lendeeProfile/loanApplication');?>
     
            
        
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="well well-sm"><strong><span ></span>Loan Application</strong></div>
                <table>
                    <div class="form-group">
                       
                    <label >Loan Amount </label>
                     <?php echo form_error('loanAmount'); ?>
                    <div class="input-group">
                        
                         <input type="text" class="form-control" name="loanAmount" id="InputName" value=" <?php echo set_value('loanAmount'); ?>" required>
                         <span class="input-group-addon"><span ></span></span>
                    </div>
                    </div>
    <div class="form-group">
                        
                    <label >Monthly Installment</label>
                      <?php echo form_error('monthlyInstallment'); ?>
                    <div class="input-group">
                
                         <input type="text" class="form-control" name="monthlyInstallment" id="InputName"  value=" <?php echo set_value('monthlyInstallment'); ?>"required>
                         <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
       <div class="form-group">
           
                    <label >Payment period(months)</label>
                      <?php echo form_error('paymentPeriod'); ?>
                    <div class="input-group">
                         
                        <input type="text" class="form-control" name="paymentPeriod" id="InputName" value=" <?php echo set_value('paymentPeriod'); ?>" required>
                         <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
        <div class="form-group">
            
                    <label >Purpose</label>
                     <?php echo form_error('purpose'); ?>
                           <div class="input-group">
                                
                                <select  class="form-control" name="purpose" id="InputName" value=" <?php echo set_value('purpose'); ?>" >
                            <option value="businessExpenses">business expenses</option>
                            <option value="expandBusiness">start or expand business</option>
                            <option value="initiateAproject">Initiate a project</option>
    
                        </select>
                                <span class="input-group-addon"><span ></span></span>
                           </div>
         </div>
                    
         <div class="form-group">
                    
                      <label>Date of application </label>
                         <?php echo form_error('applicationDate'); ?>
                           <div class="input-group">
                                 
                                <input type="date" id="datepicker" class="form-control" name ="applicationDate" value=" <?php echo set_value('applicationDate'); ?>">
                                <span class="input-group-addon"><span ></span></span>
               
                           </div>
                
         </div>
        <div class="form-group">
                      <label> Upload loan form </label>
                      <?php echo form_error('applicationDate'); ?>
                           <div class="input-group">
                                <input type="file" id="InputName" class ="form-control" name ="uploadedLoanapp" value=" <?php echo set_value('uploadedLoanapp'); ?>">
                                <span class="input-group-addon"><span ></span></span>
               
                           </div>
                
         </div>
   
      
                </table>
                <input type="submit" name="submit"  value="Submit" >
            </div>
        <?php echo form_close();?>
        
    </div>
</div>
