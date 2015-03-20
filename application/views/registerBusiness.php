<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="row">
        <form role="form">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label >Business Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="business_name" id="InputName" placeholder="Enter business name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label >Business Location</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="business_location" id="InputName" placeholder="Enter Location of business" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label >Business Category</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="business_category" id="InputName" placeholder="Enter business category" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label >Business Description</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="business_description" id="InputName" placeholder="Enter business description" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                     <label>Business Assets-worth</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="business_worth" id="InputName" placeholder="Enter the worth of business assets" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label >Current Income</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="business_current_income" id="InputName" placeholder="Enter current income" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right ">
            </div>
        </form>
        
    </div>
</div>