<div class="container">

  <?php echo validation_errors(); ?>
  <?php echo form_open('login/view', $attributes); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="form-control" name='username' placeholder="User name" required autofocus>
    <input type="password" class="form-control" name='password' placeholder="Password" required>
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div> <!-- /container -->
