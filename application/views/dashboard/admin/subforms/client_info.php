<div class="well well-sm">
  <?php if(!$result['geocode']): ?>
    <div class="alert alert-danger not-mapped">Client's address is not mapped.
      <a href="<?php echo base_url(); ?>dashboard/client/view_client/<?=$result['UID']?>"
        class="alert-link">Fix now!</a>
    </div>
  <?php endif ?>
  <p><a href="<?php echo base_url(); ?>dashboard/client/view_client/<?=$result['UID']?>">
    <?php echo $result['last_name'] . ', ' . $result['first_name']; ?></a></p>
  <p><?php echo $result['street_address']; ?></p>
  <?php
    if($result['unit_number']) {
          echo '<p>Unit Number: ' . $result['unit_number'] . '</p>';
    }
  ?>
  <p><?php echo $result['city'] . ", " . $result['state'] . " " . $result['zip_code']; ?></p>
  <p>Primary Phone: <?php echo $result['primary_phone']; ?></p>
  <p>Secondary Phone: <?php echo $result['secondary_phone']; ?></p>
  <div style="display:none">
    <input type="text" id="hidden-uid" class="form-control" name="uid"
     value="<?php echo $result['UID'] ?>"/>
  </div>
</div>
