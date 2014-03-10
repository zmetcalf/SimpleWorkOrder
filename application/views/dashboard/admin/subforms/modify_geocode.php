<div class="modal fade bs-modal-lg" id="modify-geocode" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Centerpoint</h4>
      </div>
      <div class="modal-body" id="cntr-pnt">
        <p>Please obtain a centerpoint at <a href='http://nominatim.openstreetmap.org/'
          target='_blank'>Nominatim</a>.</p>
        <div class="form-group">
          <label for="latatude">Latatude</label>
          <input type="text" class="form-control latatude" placeholder="Latatude" name="latatude"/>
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" class="form-control longitude" placeholder="Longitude" name="longitude"/>
        </div>
        <h3 class="text-center">---- OR ----</h3>
        <div class="form-group">
          <label for="centerpoint">Centerpoint</label>
          <input type="text" class="form-control centerpoint" placeholder="Centerpoint" name="centerpoint"/>
        </div>
        <div style="display:none"><!-- This is for ajax requests -->
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
            value="<?php echo $this->security->get_csrf_hash(); ?>">
        </div>
      </div>
      <div class="update-error"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-centerpoint">Change map point</button>
      </div>
    </div>
  </div>
</div>