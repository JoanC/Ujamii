<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>-->
<div class="container">
    <div id="login">
        <form role="form" action="<?php echo site_url('lendeeProfile/registerBusiness'); ?>" method="post">
            <div class="col-md-5"></div>
            <div class="col-md-6">
                <div class="well well-sm"><strong><span ></span>Business Registration</strong></div>
                <table>
                    <tr>
    <td><label>Business Name </label>
    </td>
    <td><input name ="businessName" type="text" />
    </td>
    <td><p></p></td>
  </tr>
        <tr>
    <td><label>Location </label>
    </td>
    <td><input name ="businessLocation" type="text" />
    </td>
    <td><p></p></td>
  </tr>
        <tr>
    <td><label>Category </label>
    </td>
    <td> <select name="businessCategory" >
    <option value="volvo">Creative</option>
    <option value="saab">Service</option>
    <option value="mercedes">Jua Kali</option>
    
  </select>
    </td>
    <td><p></p></td>
  </tr>
        <tr>
    <td><label> Description </label>
    </td>
    <td><textarea name="businessDescription" rows="5" cols="40"></textarea>
    </td>
    <td><p></p></td>
  </tr>
        <tr>
    <td><label>Asset-worth </label>
    </td>
    <td><input name ="assetWorth" type="text" />
    </td>
    <td><p></p></td>
  </tr>
        <tr>
    <td><label> Current Income (per month)</label>
    </td>
    <td><input name ="currentIncome" type="text" />
    </td>
    <td><p></p></td>
  </tr>
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
