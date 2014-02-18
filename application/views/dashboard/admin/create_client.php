<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header">Create Client</h1>
  <?php echo form_open('dashboard/create-client') ?>
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name" name="last-name"
           value="<?php echo set_value('last-name'); ?>" required/>
  </div>
  <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" class="form-control" placeholder="First Name" name="first-name"
           value="<?php echo set_value('first-name'); ?>" required/>
  </div>
  <div class="form-group">
    <label for="street-address">Street Address</label>
    <input type="text" class="form-control" placeholder="Street Address"
           name="street-address" value="<?php echo set_value('street-address'); ?>"/>
  </div>
  <div class="form-group">
    <label for="unit-number">Unit Number</label>
    <input type="text" class="form-control" placeholder="Unit or Apartment Number`"
           name="unit-number" value="<?php echo set_value('unit-number'); ?>"/>
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" placeholder="City"
           name="city" value="<?php echo set_value('city'); ?>"/>
  </div>
  <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" placeholder="State"
           name="state" value="<?php echo set_value('state'); ?>"/>
  </div>
  <div class="form-group">
    <label for="zip-code">Zip Code</label>
    <input type="text" class="form-control" placeholder="Zip Code"
           name="zip-code" value="<?php echo set_value('zip-code'); ?>"/>
  </div>
  <div class="form-group">
    <label for="primary-phone">Primary Phone Number</label>
    <input type="tel" class="form-control" placeholder="Primary Phone Number"
           name="primary-phone" value="<?php echo set_value('primary-phone'); ?>"/>
  </div>
  <div class="form-group">
    <label for="secondary-phone">Secondary Phone Number</label>
    <input type="tel" class="form-control" placeholder="Secondary Phone Number"
           name="secondary-phone" value="<?php echo set_value('secondary-phone'); ?>"/>
  </div>
  <div class="form-group">
    <label for="additional-info">Additional Information</label>
    <textarea class="form-control" rows="5" placeholder="Driving instructions, caregiver, etc..."
           name="additional-info" value="<?php echo set_value('additional-info'); ?>"></textarea>
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="Create user" />
  </form>
</div>