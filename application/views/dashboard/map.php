<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>
    <div id='map'></div>
</div>
<div style="display:none"><!-- This is for ajax requests -->
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">
  <input type="hidden" id="base-url" value="<?php echo base_url(); ?>"/>
</div>
