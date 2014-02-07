<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header">Create User</h1>
  <?php echo form_open('dashboard/create-user') ?>
  <?php echo validation_errors(); ?>
  <label for="user-type">User Type</label>
  <div class="form-group">
    <select class="form-control" name="user-type">
      <option>Volunteer</option>
      <option>Administrator</option>
    </select>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" placeholder="Username" name="username" required/>
  </div>
  <div class="form-group"><!-- To go away in the future - Autogenerate-->
    <label for="password">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" required/>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="Email" name="email" required/>
  <div>

  <br />
  <input type="submit" class="btn btn-primary" name="submit" value="Create user" />
  </form>
</div>