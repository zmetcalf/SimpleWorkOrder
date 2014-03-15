    <div class="col-sm-5 col-md-5">
      <?php if ($admin): ?>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Open Work Orders
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <?php foreach($open as $wo): ?>
              <div class="well">
                <p><a href="<?php echo base_url() ?>dashboard/view-wo/<?php echo $wo['wo_uid'] ?>">
                  <?php echo $wo['last_name'] . ", " . $wo['first_name'] ?></a>
                 - <?php echo $wo['job_type'] . " - " . $wo['city'] . " - " . $wo['wo_additional_info'] ?></p>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                Closed Work Orders
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
              <?php foreach($closed as $wo): ?>
              <div class="well">
                <p><a href="<?php echo base_url() ?>dashboard/view-wo/<?php echo $wo['wo_uid'] ?>">
                  <?php echo $wo['last_name'] . ", " . $wo['first_name'] ?></a>
                 - <?php echo $wo['job_type'] . " - " . $wo['city'] . " - " . $wo['wo_additional_info'] ?></p>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div> <!-- End Main -->
</div> <!-- End Row -->
