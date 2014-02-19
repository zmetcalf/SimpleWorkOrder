<div class="col-sm-5 col-sm-offset-3 col-md-5 col-md-offset-2 main">
  <h1 class="page-header">Your Assigned Work Orders</h1>
  <?php foreach($result as $wo): ?>
  <div class="well">
    <p><a href="<?php echo base_url() ?>dashboard/view-wo/<?php echo $wo['wo_uid'] ?>">
      <?php echo $wo['last_name'] . ", " . $wo['first_name'] ?></a>
     - <?php echo $wo['job_type'] . " - " . $wo['city'] . " - " . $wo['wo_additional_info'] ?></p>
  </div>
  <?php endforeach ?>
</div>