<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">View Client</h1>
  <div class="row">
    <div class="well col-sm-3 col-md-5">
      <p><?php echo $result['last_name'] . ', ' . $result['first_name']; ?></p>
      <p><?php echo $result['street_address']; ?></p>
      <p><?php echo $result['unit_number']; ?></p>
      <p><?php echo $result['city'] . ", " . $result['state'] . " " . $result['zip_code']; ?></p>
      <p>Primary Phone: <?php echo $result['primary_phone']; ?></p>
      <p>Secondary Phone: <?php echo $result['secondary_phone']; ?></p>
      <a href="<?php echo base_url() . 'dashboard/modify-client/' . $result['UID']; ?>"
        class="btn btn-primary">Modify Client</a>
      <div id="hidden-uid" name="uid"  style="display:none"><?php echo $result['UID'] ?></div>
      <input type="text" id="hidden-uid" class="form-control" name="uid"
        value="<?php echo $result['UID'] ?>"  style="display:none"/>
    </div>