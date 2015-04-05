<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Settings</h1>
  <div class="row">
    <div class="col-sm-5 col-md-5">
      <?php
        echo form_open('settings/settings');
        echo validation_errors('<div class="alert alert-danger">', '</div>');
        if (isset($_GET['updated'])) {
          echo '<div class="alert alert-success">Successfully Update Information.</div>';
        }
      ?>

      <div class="page-header"><h1><small>Change password:</small></h1></div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password"
               value="<?php echo set_value('password'); ?>"/>
      </div>
      <div class="form-group">
        <label for="passconf">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="passconf"
               value="<?php echo set_value('passconf'); ?>"/>
      </div>
      <input type="submit" class="btn btn-primary" name="update-password" value="Change Password" />
    </div>

    <div class="col-sm-5 col-md-5">
      <div class="page-header"><h1><small>Change contact info:</small></h1></div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="opt_in" <?php if ($user['opt_in']) { echo 'checked'; } ?>>Opt-in to receive emails
        </label>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email"
               value="<?php echo $user['email']; ?>"/>
      </div>
      <div class="form-group">
        <label for="street-address">Street Address</label>
        <input type="text" class="form-control" placeholder="Street Address"
               name="street-address" value="<?php echo $user['street_address']; ?>"/>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" placeholder="City"
               name="city" value="<?php echo $user['city']; ?>"/>
      </div>
      <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" placeholder="State"
               name="state" value="<?php echo $user['state']; ?>"/>
      </div>
      <div class="form-group">
        <label for="zip-code">Zip Code</label>
        <input type="text" class="form-control" placeholder="Zip Code"
               name="zip-code" value="<?php echo $user['zip_code']; ?>"/>
      </div>
      <div class="form-group">
        <label for="primary-phone">Primary Phone Number</label>
        <input type="tel" class="form-control" placeholder="Primary Phone Number"
               name="primary-phone" value="<?php echo $user['primary_phone']; ?>"/>
      </div>
      <div class="form-group">
        <label for="secondary-phone">Secondary Phone Number</label>
        <input type="tel" class="form-control" placeholder="Secondary Phone Number"
               name="secondary-phone" value="<?php echo $user['secondary_phone']; ?>"/>
      </div>
      <input type="submit" class="btn btn-primary" name="update-contact-info" value="Update Contact Info" />
    </div>
  </form>
</div>
