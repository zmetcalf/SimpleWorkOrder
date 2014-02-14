<div class="col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h1 class="page-header">View Work Order</h1>
  <?php echo form_open('dashboard/view-wo/' . $record) ?>
  <div class="well well-sm">
    <p><?php echo $result['last_name'] . ', ' . $result['first_name']; ?></p>
    <p><?php echo $result['street_address']; ?></p>
    <p><?php echo $result['city'] . ", " . $result['state'] . " " . $result['zip_code']; ?></p>
    <p>Primary Phone: <?php echo $result['primary_phone']; ?></p>
    <p>Secondary Phone: <?php echo $result['secondary_phone']; ?></p>
  </div>
  <input type="submit" class="btn btn-default" name="unassign" value="Unregister me" />
  <input type="submit" class="btn btn-primary" name="assign" value="Sign Me Up!" />
  </form>
</div>