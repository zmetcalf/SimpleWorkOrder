<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Create User</h1>
  <?php echo form_open('dashboard/create-user') ?>
  <label for="username">Username</label>
  <input type="text" name="username"/><br />

  <label for="password">Password</label>
  <input type="password" name="password"/><br />

  <input type="submit" name="submit" value="Create user" />
  </form>
</div>