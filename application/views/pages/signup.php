<div class="inner cover">
  <?php if ($success): ?>
  <p class="lead">Thank you for signing up, a member of our organization will contact you shortly.</p>
  <?php else: ?>
  <h1 class="cover-heading">Sign up today to help your community!</h1>
  <?php echo form_open('page/signup/'); ?>
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" name="first_name"
               value="<?php echo set_value('first_name'); ?>" required autofocus/>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" name="last_name"
               value="<?php echo set_value('last_name'); ?>" required/>
      </div>
      <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="user_name"
               value="<?php echo set_value('user_name'); ?>" required/>
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email"
               value="<?php echo set_value('email'); ?>" required/>
      </div>
      <div class="form-group">
        <label for="primary_phone">Primary Phone Number</label>
        <input type="tel" class="form-control" placeholder="Primary Phone Number"
               name="primary_phone" value="<?php echo set_value('primary_phone'); ?>" required/>
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
      <div class='form-group' style="display:none">
        <label for='h-o-ney-pot'>Required</label>
        <input type='text' name='h-o-ney-pot' class='form-control' id='h-o-ney-pot' placeholder='Required'>
      </div>
    </div>
  </div>
  <input type="submit" class="btn btn-default" name="submit" value="Sign up!"/>
  </form>
  <?php endif; ?>
</div>