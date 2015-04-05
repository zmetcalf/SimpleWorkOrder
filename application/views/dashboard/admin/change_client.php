<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header"><?php echo $page_header; ?></h1>
  <?php
    if($page_header == 'Create Client') {
      echo form_open('dashboard/client/create_client');
    }
    else if($page_header == 'Modify Client') {
      echo form_open('dashboard/client/modify_client/' . $record);
    }
  ?>
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" placeholder="First Name" name="first_name"
           value="<?php echo $first_name; ?>" required/>
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
           value="<?php echo $last_name; ?>" required/>
  </div>
  <div class="form-group">
    <label for="street_address">Street Address</label>
    <input type="text" class="form-control" placeholder="Street Address"
           name="street_address" value="<?php echo $street_address; ?>" required/>
  </div>
  <div class="form-group">
    <label for="unit_number">Unit Number</label>
    <input type="text" class="form-control" placeholder="Unit or Apartment Number`"
           name="unit_number" value="<?php echo $unit_number; ?>"/>
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" placeholder="City"
           name="city" value="<?php echo $city; ?>" required/>
  </div>
  <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" placeholder="State"
           name="state" value="<?php echo $state; ?>" required/>
  </div>
  <div class="form-group">
    <label for="zip_code">Zip Code</label>
    <input type="text" class="form-control" placeholder="Zip Code"
           name="zip_code" value="<?php echo $zip_code; ?>" required/>
  </div>
  <div class="form-group">
    <label for="primary_phone">Primary Phone Number</label>
    <input type="tel" class="form-control" placeholder="Primary Phone Number"
           name="primary_phone" value="<?php echo $primary_phone; ?>" required/>
  </div>
  <div class="form-group">
    <label for="secondary_phone">Secondary Phone Number</label>
    <input type="tel" class="form-control" placeholder="Secondary Phone Number"
           name="secondary_phone" value="<?php echo $secondary_phone; ?>"/>
  </div>
  <div class="form-group">
    <label for="additional_info">Additional Information</label>
    <textarea class="form-control" rows="5" placeholder="Driving instructions, caregiver, etc..."
           name="additional_info"><?php echo $additional_info; ?></textarea>
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="<?php echo $submit_button; ?>" />
  </form>
</div>
