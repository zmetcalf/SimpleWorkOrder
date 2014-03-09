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
        <div class="form-inline" role="form">
          <div class="form-group">
            <label for="lat-lon">Latatude and Longitude</label>
            <input type="text" class="form-control" placeholder="Latatude" name="latatude"/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Longitude" name="longitude"/>
          </div>
        </div>
        <h3 class="text-center">---- OR ----</h3>
        <div class="form-group">
          <label for="center_point">Centerpoint</label>
          <input type="text" class="form-control" placeholder="Centerpoint" name="centerpoint"/>
        </div>
        <div class="form-group">
        </div>
      </div>
      <div class="centerpoint-errors"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-centerpoint">Change Centerpoint</button>
      </div>
    </div>
  </div>
</div>