<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">View User</h1>
  <div class="row">
    <div class="well col-sm-5 col-md-5">
      <?php
        if($password) {
          echo '<div class="alert alert-success">' . $result['first_name'] . ' ' .
               $result['last_name'] . "'s new password is " . $password . ".</div>";
        }
      ?>
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
      <a href="<?php echo base_url() . 'dashboard/modify-user/' . $result['UID']; ?>"
        class="btn btn-primary">Modify User</a>
      <?php if ($result['active'] == 'Active'): ?>
      <a href='<?php echo base_url() . 'dashboard/reset-password/' . $result['UID'] ?>'
                 class="btn btn-danger">Reset Password</a>
      <?php elseif ($result['active'] == 'Pending'): ?>
      <a href='<?php echo base_url() . 'dashboard/activate-user/' . $result['UID'] ?>'
                 class="btn btn-danger">Activate User</a>
      <?php endif; ?>
    </div>
