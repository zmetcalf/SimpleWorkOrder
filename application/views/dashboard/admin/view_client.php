<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">View Client</h1>
  <div class="row">
    <div class='col-sm-5 col-md-5'>
      <?php if(!$result['geocode']): ?>
        <div class="alert alert-danger not-mapped">Client's address is not mapped.</div>
      <?php else: ?>
        <div style="display:none">
          <input type="hidden" id="centerpoint" value="<?php echo $result['geocode']?>"/>
        </div>
      <?php endif ?>
      <div class="well">
        <p><?php echo $result['last_name'] . ', ' . $result['first_name']; ?></p>
        <p><?php echo $result['street_address']; ?></p>
        <p><?php echo $result['unit_number']; ?></p>
        <p><?php echo $result['city'] . ", " . $result['state'] . " " . $result['zip_code']; ?></p>
        <p>Primary Phone: <?php echo $result['primary_phone']; ?></p>
        <p>Secondary Phone: <?php echo $result['secondary_phone']; ?></p>
        <div style="display:none">
          <input type="hidden" id="UID" value="<?php echo $result['UID']?>"/>
        </div>
        <?php if($admin): ?>
          <div class="form-group">
            <button class="btn btn-danger" type="button" data-toggle='modal' data-target='#modify-geocode'>
              Change map point
            </button>
            <a href="<?php echo base_url() . 'dashboard/client/modify_client/' . $result['UID']; ?>"
              class="btn btn-primary">Modify Client</a>
          </div>
        <?php endif ?>
      </div>
      <div id='map' style='height:300px'></div>
    </div>
