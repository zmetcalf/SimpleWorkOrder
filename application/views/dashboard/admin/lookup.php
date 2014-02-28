<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Record Lookup</h1>
    <div class="col-sm-3 col-md-5">
    <div class="form-group">
      <label for="search-for">Search for:</label>
      <select class="form-control lookup-type">
        <option>Client</option>
        <option>User</option>
        <option>Work Order</option>
      </select>
    </div>
    <div class="form-group person-group">
      <label for="last-name">Last Name</label>
      <input type="text" class="form-control search-text" placeholder="Last Name" name="last-name"/>
    </div>
    <div class="form-group person-group">
      <label for="first-name">First Name</label>
      <input type="text" class="form-control search-text" placeholder="First Name" name="first-name"/>
    </div>
    <div class="form-group user-group">
      <label for="username">Username</label>
      <input type="text" class="form-control search-text" placeholder="Username" name="username"/>
    </div>
    <div class="form-group user-group">
      <label for="email">Email</label>
      <input type="email" class="form-control search-text" placeholder="Email" name="email"/>
    </div>
    <div class="form-group wo-group">
      <label for="job-type">Job Type</label>
      <select class="form-control job-type" name="job-type">
        <option>General</option>
        <option>Electricrical</option>
        <option>Plumbing</option>
        <option>HVAC</option>
      </select>
    </div>
    <div class="form-group">
      <button type="button" class="btn btn-primary" id="lookup">Search</button>
    </div>
  </div>

  <div class="col-sm-3 col-sm-offset-1 col-md-5 col-md-offset-1">
    <div class="search-results"></div>
    <div class="lookup-error"></div>
  </div>
  <div style="display:none"><!-- This is for ajax requests -->
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
      value="<?php echo $this->security->get_csrf_hash(); ?>">
  </div>
</div>