<div class="well well-sm">
  <p><?php echo $result['last_name'] . ', ' . $result['first_name']; ?></p>
  <p><?php echo $result['street_address']; ?></p>
  <p><?php echo $result['city'] . ", " . $result['state'] . " " . $result['zip_code']; ?></p>
  <p>Primary Phone: <?php echo $result['primary_phone']; ?></p>
  <p>Secondary Phone: <?php echo $result['secondary_phone']; ?></p>
  <div id="hidden-uid" name="uid"><?php echo $result['UID'] ?></div>
  <input type="text" id="hidden-uid" class="form-control" name="uid"
    value="<?php echo $result['UID'] ?>"/>
</div>