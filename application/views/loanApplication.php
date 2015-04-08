<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script>
    $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'}).val()
    });
</script>

<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<div class="container">
    <div class="row">
        <?php echo form_open_multipart('lendeeProfile/loanApplication');?>
     
            
        
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="well well-sm"><strong><span ></span>Loan Application</strong></div>
                <table>
                    <div class="form-group">
                    <label >Loan Amount</label>
                    <div class="input-group">
                         <input type="text" class="form-control" name="loanAmount" id="InputName" required>
                         <span class="input-group-addon"><span ></span></span>
                    </div>
                    </div>
    <div class="form-group">
                    <label >Monthly Installment</label>
                    <div class="input-group">
                         <input type="text" class="form-control" name="monthlyInstallment" id="InputName" required>
                         <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
       <div class="form-group">
                    <label >Payment period(months)</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="paymentPeriod" id="InputName" required>
                         <span class="input-group-addon"><span ></span></span>
                    </div>
                </div>
        <div class="form-group">
                    <label >Purpose</label>
                           <div class="input-group">
                                <input type="text" class="form-control" name="purpose" id="InputName" required>
                                <span class="input-group-addon"><span ></span></span>
                           </div>
         </div>
                    
         <div class="form-group">
                      <label>Date of application </label>
                           <div class="input-group">
                                <input type="date" id="datepicker" class="form-control" name ="applicationDate">
                                <span class="input-group-addon"><span ></span></span>
               
                           </div>
                
         </div>
        <div class="form-group">
                      <label> Upload loan form </label>
                           <div class="input-group">
                                <input type="file" id="InputName" class ="form-control" name ="uploadedLoanapp">
                                <span class="input-group-addon"><span ></span></span>
               
                           </div>
                
         </div>
   
      
                </table>
                <input type="submit" name="submit"  value="Submit" >
            </div>
        <?php echo form_close();?>
        
    </div>
</div>
