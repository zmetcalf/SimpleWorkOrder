<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'dashboard') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard">Dashboard</a></li>
    <li <?php if($slug == 'create-wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/create-wo">New Work Order</a></li>
    <li <?php if($slug == 'create-client') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/create-client">New Client</a></li>
    <li <?php if($slug == 'create-user') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/create-user">New User</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'unassigned-wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list-unassigned-wo">Unassigned WO's</a></li>
    <li <?php if($slug == 'assign-wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list-assigned-wo">Assigned WO's</a></li>
    <li <?php if($slug == 'stale-wo') { echo 'class="active"'; } ?>><a href="<?php echo base_url() ?>dashboard/list-stale-assigned-wo">Stale Assigned WO's</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li <?php if($slug == 'client-lookup') { echo 'class="active"'; } ?>><a href="">Client Lookup</a></li>
    <li <?php if($slug == 'user-lookup') { echo 'class="active"'; } ?>><a href="">User Lookup</a></li>
    <li <?php if($slug == 'wo-lookup') { echo 'class="active"'; } ?>><a href="">Work Order Lookup</a></li>
  </ul>
</div>
