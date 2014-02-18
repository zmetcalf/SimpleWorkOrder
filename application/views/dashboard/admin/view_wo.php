<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">View Work Order</h1>
  <?php echo form_open('dashboard/view-wo/' . $record) ?>
  <div class="row">
  <div class="well col-sm-3 col-md-5">
    <p><?php echo $result['last_name'] . ', ' . $result['first_name']; ?></p>
    <p><?php echo $result['street_address']; ?></p>
    <p><?php echo $result['unit_number']; ?></p>
    <p><?php echo $result['city'] . ", " . $result['state'] . " " . $result['zip_code']; ?></p>
    <p>Primary Phone: <?php echo $result['primary_phone']; ?></p>
    <p>Secondary Phone: <?php echo $result['secondary_phone']; ?></p>
    <p>Additional Info: <?php echo $result['additional_info']; ?></p>
  </div>
  <div class="well col-sm-3 col-sm-offset-1 col-md-5 col-md-offset-1">
    <p>Job Type: <?php echo $result['job_type']; ?></p>
    <p>Job Information: <?php echo $result['wo_additional_info']; ?></p>
    <p>Created on: <?php $this->load->helper('date'); echo unix_to_human(mysql_to_unix($result['wo_created_on'])); ?></p>
  </div>
  </div>
  <?php if($assigned_to_user): ?>
    <input type="submit" class="btn btn-default" name="unassign" value="Unregister me" />
  <?php else: ?>
    <input type="submit" class="btn btn-primary" name="assign" value="Sign Me Up!" />
  <?php endif; ?>
  </form>
</div>
