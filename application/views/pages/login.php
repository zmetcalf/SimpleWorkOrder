<div class="container">

  <?php echo form_open('login', $attributes); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="form-control" name='username' placeholder="User name" required autofocus>
    <input type="password" class="form-control" name='password' placeholder="Password" required>
    <?php echo validation_errors('<div class="alert alert-danger validation-errors">', '</div>'); ?>
    <div class="reset-success login-errors"></div>
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br>
    <a href='#' data-toggle='modal' data-target='#forgot-password'>Forgot password</a>
    <br>
    <a href='<?php echo base_url(); ?>'/>Return to homepage</a>
  </form>
</div> <!-- /container -->
<div style="display:none"><!-- This is for ajax requests -->
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">
  <input type="hidden" id="base-url" value="<?php echo base_url(); ?>"/>
</div>
