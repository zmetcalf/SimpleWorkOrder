<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">View User</h1>
  <div class="row">
    <div class="well col-sm-3 col-md-5">
      <p><?php echo $result['active'] . ' - ' . $result['user_type']; ?></p>
      <p><?php echo $result['last_name'] . ', ' . $result['first_name']; ?></p>
      <p>Username: <?php echo $result['user_name'] ?></p>
      <p>Email: <?php echo $result['email']; ?></p>
      <?php
        if($result['specialty']) {
          echo '<p>Specialty: ' . $result['specialty'] . '</p>';
        }
        if($result['street_address']) {
          echo '<p>' . $result['street_address'] . '</p>';
        }

        if($result['city'] && $result['state'] && $result['zip_code']) {
           echo '<p>' . $result['city'] . ", " . $result['state'] . " " . $result['zip_code'] . '</p>';
        }
        else if($result['city']) {
          echo '<p>' . $result['city'] . '</p>';
        }

        if($result['primary_phone']) {
          echo '<p>Primary Phone: ' . $result['primary_phone'] . '</p>';
        }
        if($result['secondary_phone']) {
          echo '<p>Secondary Phone: ' . $result['secondary_phone'] . '</p>';
        }
      ?>
      <div id="hidden-uid" name="uid"  style="display:none"><?php echo $result['UID']; ?></div>
      <input type="text" id="hidden-uid" class="form-control" name="uid"
        value="<?php echo $result['UID'] ?>"  style="display:none"/>
    </div>