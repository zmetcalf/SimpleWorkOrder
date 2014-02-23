<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header">Record Lookup</h1>
    <div class="form-group">
      <label for="search-for">Search for:</label>
      <select class="form-control lookup-type">
        <option>Client</option>
        <option>User</option>
        <option>Work Order</option>
      </select>
    </div>
    <div class="form-group">
      <label for="last-name">Last Name</label>
      <input type="text" class="form-control search-text" placeholder="Last Name" name="last-name"/>
    </div>
    <div class="form-group">
      <label for="first-name">First Name</label>
      <input type="text" class="form-control search-text" placeholder="First Name" name="first-name"/>
    </div>
    <div class="form-group">
      <button type="button" class="btn btn-primary" id="lookup">Search</button>
    </div>
  <div class="search-results"></div>
  <div class="lookup-error"></div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="select-client">Select Client</button>
  </div>
</div>