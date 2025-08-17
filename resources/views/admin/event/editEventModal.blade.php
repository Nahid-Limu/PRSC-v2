<!-- Vertically centered Modal -->
  <div class="modal fade" id="EditEventModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-edit text-success'></i> Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="EditEventForm" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <input type="hidden" id="edit_data_id" name="id">

                <div class="col-12">
                  <label for="name" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="edit_title" required>
                </div>

                <div class="col-md-6">
                  <label for="date" class="col-sm-2 col-form-label">Date</label>
                  <input type="date" class="form-control" name="event_date" id="edit_event_date" required>
                </div>
                
                <div class="col-md-6">
                  <label for="time" class="col-sm-2 col-form-label">Time</label>
                  <input type="time" class="form-control" name="event_time" id="edit_event_time" required>
                </div>

                <div class="col-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" name="description" id="edit_description" required cols="20" rows="5"></textarea>
                </div>
                
                <div class="col-md-6">
                  <label for="image" class="form-label">Photo</label>
                  <input type="file" class="form-control uplodeImage" name="image" id="edit_image">
                </div>
                
                <div class="col-md-6">
                  <div class="text-center">
                    <img src="" class='img-fluid imgPreview' id="imageView" style='widows: 70px; height: 70px;'>
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" onclick="updateData()" class="btn btn-outline-success btn-sm">Update</button>
                  <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            <!-- Vertical Form -->
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->