<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<div class="container">
    <div class="row">
        <form role="form" action="<?php echo site_url('lendeeProfile/loanApplication'); ?>" method="post">
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
