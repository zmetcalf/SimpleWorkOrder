<div class="site-wrapper">

  <div class="site-wrapper-inner">

    <div class="cover-container">

      <div class="masthead clearfix">
        <div class="inner">
          <h3 class="masthead-brand"><a href="<?php echo base_url(); ?>">SimpleWorkOrder</a></h3>
          <ul class="nav masthead-nav">
            <li <?php if ($slug == 'home') { echo 'class="active"'; } ?>>
              <a href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li <?php if ($slug == 'contact') { echo 'class="active"'; } ?>>
              <a href="<?php echo base_url(); ?>page/contact/">Contact</a>
            </li>
            <li <?php if ($slug == 'signup') { echo 'class="active"'; } ?>>
              <a href="<?php echo base_url(); ?>page/signup/">Sign Up</a>
            </li>
            <li><a href="<?php echo base_url(); ?>login/">Log In</a></li>
          </ul>
        </div>
      </div>