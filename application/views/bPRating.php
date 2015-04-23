<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<style>
    .error{
        color:red;
    }
</style>
<div class="container">
    <!--<div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>-->
    <form role="form" action="<?php echo site_url('index/rating'); ?>" method="post">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="well well-sm"><strong><span ></span>Personal details</strong></div>

                        <div class="form-group">
                            <label class="control-label">Gender</label><br>
                            <?php echo form_error('gender'); ?>
                            <table>
                                <tr><td>Female  </td><td><input   class="form-control"  type="radio" name="gender" value="female" /> </td></tr>
                                <tr><td>Male  </td><td><input   class="form-control"  type="radio" name="gender" value="male" /> </td></tr>
                            </table>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Marital Status</label>
                            <?php echo form_error('maritalStatus'); ?>
                            <table>
                                <tr> <td>Single</td> <td><input   class="form-control"  type="radio" name="maritalStatus" value="single" /></td></tr>
                                <tr> <td>Married</td> <td><input   class="form-control"  type="radio" name="maritalStatus" value="married" /></td></tr>
                                <tr> <td>Divorced</td> <td><input   class="form-control"  type="radio" name="maritalStatus" value="divorced" /></td></tr>
                            </table>
                        </div>

                        <div class="form-group">

                            <label class="control-label">Number of dependents</label>
                            <?php echo form_error('dependents'); ?>
                            <input  type="text" name = "dependents" required="required" class="form-control" value=" <?php echo set_value('dependents'); ?>" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Housing</label>
                            <?php echo form_error('housing'); ?>
                            <select  class="form-control" name="housing" id="InputName" >
                                <option value="Free">Free</option>
                                <option value="Rent">Rent</option>
                                <option value="Own">Own</option>

                            </select>

                        </div>
                        <!--                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>-->
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="well well-sm"><strong><span ></span>Business details</strong></div>
                        <div class="form-group">
                            <label class="control-label">Number of employees</label>
                             <?php echo form_error('numEmployees'); ?>
                            <input  type="text" name ="numEmployees" required="required" class="form-control" value=" <?php echo set_value('numEmployees'); ?>"   />
                        </div>


                        <div class="form-group">
                            <label class="control-label">Business existence (in years)</label>
                            <?php echo form_error('busExistence'); ?>
                            <input  type="text" name ="busExistence" required="required" class="form-control"  value=" <?php echo set_value('busExistence'); ?>" />
                        </div>
                        <!--                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>-->
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <!--                <h3> Step 3</h3>-->
                        <input type="submit" name="submit"  value="Rate" >
                        <!--                <button class="btn btn-success btn-lg pull-right" type="submit">Rate!</button>-->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>