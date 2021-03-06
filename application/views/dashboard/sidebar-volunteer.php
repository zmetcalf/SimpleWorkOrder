<div class="col-sm-3 col-md-2 sidebar">
  <h3>Your Work Orders</h3>
  <ul class="nav nav-sidebar">
    <?php
      $iterator_result = new ArrayIterator($sidebar_result);
      foreach(new LimitIterator($iterator_result, 0, 10) as $result):
    ?>
      <li><a href="<?php echo base_url() ?>dashboard/work_order/view_wo/<?php echo $result['wo_uid'] ?>">
        <?php echo $result['job_type'] ?> - <?php echo $result['last_name'] ?>,
          <?php echo $result['first_name'] ?></a></li>
    <?php endforeach ?>
  </ul>
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'assigned_wo_user') { echo 'class="active"'; } ?>>
      <a href="<?php echo base_url() ?>dashboard/list_wo/assigned_wo_user">All Assigned Work Orders</a></li>
  </ul>
</div>
