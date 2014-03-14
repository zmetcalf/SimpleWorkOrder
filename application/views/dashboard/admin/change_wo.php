<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header"><?php echo $page_header; ?></h1>
  <?php if($record): ?>
    <div style="display:none">
      <input type="hidden" id="client-uid" value="<?php echo $UID?>"/>
    </div>
  <?php endif ?>
    <div style="display:none">
      <input type="hidden" id="base-url" value="<?php echo base_url(); ?>"/>
      <input type="hidden" class="hidden-job-type" value="<?php echo $job_type; ?>">
    </div>
  <?php
    if($page_header == 'Create Work Order') {
      echo form_open('dashboard/create-wo');
    }
    else if($page_header == 'Modify Work Order') {
      echo form_open('dashboard/modify-wo/' . $record);
    }
  ?>
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <div class="form-group">
    <button class="btn btn-primary" type="button" data-toggle='modal' data-target='#find-client'>
      Find Client
    </button>
  </div>
  <div class="form-group">
    <div class='client-requesting' name='client-requesting'></div>
  </div>
  <div class="form-group">
    <label for="job_type">Job Type</label>
      <select class="form-control job_type" name="job_type">
      <option>General</option>
      <option>Electrical</option>
      <option>Plumbing</option>
      <option>HVAC</option>
    </select>
  </div>
  <div class="form-group">
    <label for="additional_info">Additional Information</label>
    <textarea class="form-control" rows="5" placeholder="Additional Information"
           name="additional_info"><?php echo $wo_additional_info; ?></textarea>
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="<?php echo $submit_button; ?>" />
  </form>
</div>