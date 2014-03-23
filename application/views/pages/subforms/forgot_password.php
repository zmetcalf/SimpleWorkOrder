<div class="modal fade bs-modal-lg" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
      </div>
      <div class="modal-body">
        <div role="form" id="forgot-password-form">
          <div class="form-group">
            <label for="user_name">Username</label>
            <input type="text" class="form-control reset-text" placeholder="Username" name="user_name"/>
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control reset-text" placeholder="Email Address" name="email"/>
          </div>
        </div>
      </div>
      <div class="response login-errors"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="reset-password">Reset Password</button>
      </div>
    </div>
  </div>
</div>
