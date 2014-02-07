<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header">Create User</h1>
  <?php echo form_open('dashboard/create-user') ?>
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <div class="form-group">
    <label for="user-type">User Type</label>
    <select class="form-control" name="user-type">
      <option>Volunteer</option>
      <option>Administrator</option>
    </select>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" placeholder="Username" name="username"
           value="<?php echo set_value('username'); ?>" required/>
  </div>
  <div class="form-group"><!-- To go away in the future - Autogenerate-->
    <label for="password">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password"
           value="<?php echo set_value('password'); ?>" required/>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="Email" name="email"
           value="<?php echo set_value('email'); ?>" required/>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" data-target=".additional-info">
      <span class="glyphicon glyphicon-chevron-down"> </span>
      Additional Information
    </div>
    <div class="collapse in additional-info">
      <div class="panel-body">
        <div class="form-group">
          <label for="specialty">Specialty</label>
          <select class="form-control" name="specialty">
            <option></option>
            <option>Handyman</option>
            <option>Electrician</option>
            <option>Plumber</option>
            <option>HVAC</option>
          </select>
        </div>
        <div class="form-group">
          <label for="street-address">Street Address</label>
          <input type="text" class="form-control" placeholder="Street Address"
                 name="street-address" value="<?php echo set_value('street-address'); ?>"/>
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
      </div>
    </div>
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="Create user" />
  </form>
</div>