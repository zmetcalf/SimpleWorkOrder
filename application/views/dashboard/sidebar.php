<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'dashboard') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard">Dashboard</a></li>
    <li <?php if($slug == 'create_wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/work_order/create_wo">New Work Order</a></li>
    <li <?php if($slug == 'create_client') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/client/create_client">New Client</a></li>
    <li <?php if($slug == 'create_user') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/user/create_user">New User</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'unassigned_wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list_wo/unassigned_wo">Unassigned WO's</a></li>
    <li <?php if($slug == 'stale_unassigned_wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list_wo/stale_unassigned_wo">Stale Unassigned WO's</a></li>
    <li <?php if($slug == 'assigned_wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list_wo/assigned_wo">Assigned WO's</a></li>
    <li <?php if($slug == 'stale_assigned_wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list_wo/stale_assigned_wo">Stale Assigned WO's</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'lookup') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/lookup/lookup">Record Lookup</a></li>
  </ul>
</div>
