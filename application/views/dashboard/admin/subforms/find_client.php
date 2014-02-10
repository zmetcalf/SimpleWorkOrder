<div class="modal fade bs-modal-lg" id="find-client" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Search for client</h4>
      </div>
      <div class="modal-body">
        <div class="form-inline" role="form" id="search-form">
          <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="last-name"/>
          </div>
          <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="first-name"/>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary" id="search-clients">Search</button>
          </div>
        </div>
      </div>
      <div class="search-results">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Select Client</button>
      </div>
    </div>
  </div>
</div>