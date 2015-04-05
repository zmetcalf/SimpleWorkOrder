<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-2 main">
  <h1 class="page-header"><?php echo $page_title; ?></h1>
  <?php foreach($result as $wo): ?>
  <div class="well">
    <p><a href="<?php echo base_url() ?>work_order/view_wo/<?php echo $wo['wo_uid'] ?>">
      <?php echo $wo['last_name'] . ", " . $wo['first_name'] ?></a>
     - <?php echo $wo['job_type'] . " - " . $wo['city'];
             if ($wo['wo_additional_info']) {
               echo " - " . $wo['wo_additional_info'];
             }
        ?>
    </p>
  </div>
  <?php endforeach ?>
</div>
