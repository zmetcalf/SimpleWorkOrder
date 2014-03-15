<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header"><?php echo $page_header; ?></h1>
  <div class="row">
    <div class="col-sm-5 col-md-5">
      <?php
        if($page_header == 'Create User') {
          echo form_open('dashboard/create-user');
        }
        else if($page_header == 'Modify User') {
          echo form_open('dashboard/modify-user/' . $record);
        }
        echo validation_errors('<div class="alert alert-danger">', '</div>');
      ?>

      <div class="form-group">
        <label for="user-type">User Type</label>
        <select class="form-control user_type" name="user_type">
          <option>Volunteer</option>
          <option>Administrator</option>
        </select>
      </div>
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
        <label for="user_name">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="user_name"
               value="<?php echo $user_name; ?>" required/>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email"
               value="<?php echo $email; ?>" required/>
      </div>
      <div class="form-group">
        <label for="specialty">Specialty</label>
        <select class="form-control specialty" name="specialty">
          <option></option>
          <option>Handyman</option>
          <option>Electrician</option>
          <option>Plumber</option>
          <option>HVAC</option>
        </select>
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="<?php echo $submit_button; ?>" />
      <?php
        if($page_header == 'Modify User') {
           echo '<a href="' . base_url() . 'dashboard/reset-password/' . $record .
                '" class="btn btn-danger">Reset Password</a>' ;
        }
      ?>
    </div>

    <div class="col-sm-5 col-md-5">
      <br>
      <div class="panel panel-default">
        <div class="panel-heading" data-toggle="collapse" data-target=".additional-info">
          <span class="glyphicon glyphicon-chevron-down"> </span>
          Additional Information
        </div>
        <div class="collapse in additional-info">
          <div class="panel-body">
            <div class="form-group">
              <label for="street_address">Street Address</label>
              <input type="text" class="form-control" placeholder="Street Address"
                     name="street_address" value="<?php echo $street_address; ?>"/>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" placeholder="City"
                     name="city" value="<?php echo $city; ?>"/>
            </div>
            <div class="form-group">
              <label for="state">State</label>
              <input type="text" class="form-control" placeholder="State"
                     name="state" value="<?php echo $state; ?>"/>
            </div>
            <div class="form-group">
              <label for="zip_code">Zip Code</label>
              <input type="text" class="form-control" placeholder="Zip Code"
                     name="zip_code" value="<?php echo $zip_code; ?>"/>
            </div>
            <div class="form-group">
              <label for="primary_phone">Primary Phone Number</label>
              <input type="tel" class="form-control" placeholder="Primary Phone Number"
                     name="primary_phone" value="<?php echo $primary_phone; ?>"/>
            </div>
            <div class="form-group">
              <label for="secondary_phone">Secondary Phone Number</label>
              <input type="tel" class="form-control" placeholder="Secondary Phone Number"
                     name="secondary_phone" value="<?php echo $secondary_phone; ?>"/>
            </div>
            <div style="display:none">
              <input type="hidden" class="hidden-specialty" value="<?php echo $specialty; ?>">
              <input type="hidden" class="hidden-user-type" value="<?php echo $user_type; ?>">
            </div>
          </div><!-- End Panel Body -->
        </div><!-- End Collapse -->
      </div><!-- End Panel -->
    </form>
    </div><!-- End Column -->
  </div><!-- End Row -->
</div><!-- End Main -->
