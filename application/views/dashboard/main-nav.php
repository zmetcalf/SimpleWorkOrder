<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $menu_title; ?></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <?php if ($admin && $pending_users): ?>
        <li class="label-danger"><a href="<?php echo base_url(); ?>user/view_pending">Pending Users</a></li>
        <?php endif; ?>
        <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
        <?php if (!$admin): ?>
        <li><a href="<?php echo base_url(); ?>list_wo/assigned_wo_user">Assigned Work Orders</a></li>
        <?php endif; ?>
        <li><a href="<?php echo base_url(); ?>settings/settings">Settings</a></li>
        <li><a href="<?php echo base_url(); ?>page/help" target="_href">Help</a></li>
        <li><a href='<?php echo base_url(); ?>logout'>Log out</a></li>
      </ul>
      <!--
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
      </form>
      -->
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">



