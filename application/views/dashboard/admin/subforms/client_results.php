<form role='form' id='select-form'>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Select</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Street Address</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $result_row): ?>
      <tr>
          <td><input type="radio" name="optionsRadios" value="<?php echo $result_row['UID'] ?>"></td>
          <td><?php echo $result_row['last_name'] ?></td>
          <td><?php echo $result_row['first_name'] ?></td>
          <td><?php echo $result_row['street_address'] ?></td>
          <td><?php echo $result_row['city'] ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</form>