<div class="container">

  <?php echo form_open('login', $attributes); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="form-control" name='username' placeholder="User name" required autofocus>
    <input type="password" class="form-control" name='password' placeholder="Password" required>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div> <!-- /container -->
