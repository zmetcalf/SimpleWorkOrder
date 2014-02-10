<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header">Create Work Order</h1>
  <?php echo form_open('dashboard/create-wo') ?>
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <div class="form-group">
    <button class="btn btn-primary" type="button" data-toggle='modal' data-target='#find-client'>
      Find Client
    </button>
    <div class='client-requesting' name='client-requesting'></div>
  </div>
  <div class="form-group">
    <label for="job-type">Job Type</label>
      <select class="form-control" name="job-type">
      <option>General</option>
      <option>Electricrical</option>
      <option>Plumbing</option>
      <option>HVAC</option>
    </select>
  </div>
  <div class="form-group">
    <label for="additional-info">Additional Information</label>
    <textarea class="form-control" rows="5" placeholder="Additional Information"
           name="additional-info" value="<?php echo set_value('additional-info'); ?>"></textarea>
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="Create work order" />
  </form>
</div>