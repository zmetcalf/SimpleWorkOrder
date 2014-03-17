<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-2 main">
  <h1 class="page-header"><?php echo $page_title; ?></h1>
  <?php foreach ($result as $user): ?>
  <div class="well">
    <p><a href="<?php echo base_url() ?>dashboard/user/view_user/<?php echo $user['UID'] ?>">
      <?php echo  $user['first_name'] . ' ' . $user['last_name'] ?></a></p>
  </div>
  <?php endforeach ?>
</div>