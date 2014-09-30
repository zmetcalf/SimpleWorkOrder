A work order has been entered into SimpleWorkOrder:

<?php echo $first_name . ' ' . $last_name . "\n"; ?>
<?php echo $street_address . "\n"; ?>
<?php if($unit_number) { echo 'Unit Number: ' . $unit_number . "\n";} ?>
<?php echo $city . ', ' . $state . ' ' . $zip_code . "\n"; ?>

Primary Phone: <?php echo $primary_phone . "\n"; ?>
<?php if($secondary_phone) { echo 'Secondary Phone: ' . $secondary_phone . "\n"; } ?>

<?php if($additional_info) { echo 'Additional Info: ' . $additional_info . "\n"; } ?>

Job Type: <?php echo $job_type . "\n"; ?>
<?php if($wo_additional_info) { 'Job Info: ' . $wo_additional_info . "\n"; } ?>

To sign up, go to <?php echo base_url() . 'dashboard/work_order/view_wo/' . $UID; ?> when logged in.

To unsubscibe from this email list, login to SimpleWorkOrder at <?php echo base_url() . 'login'; ?>
 and go to settings. Uncheck the opt-in and click Update Contact Info.
