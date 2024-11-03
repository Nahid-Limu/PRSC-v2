<!-- Vertically centered Modal -->
  <div class="modal fade" id="AddEventModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-file-plus text-success'></i> Add Event</h5>
          <button type="button"  onclick="onCloseModal('AddEventForm')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <span id="form_result"></span>
        <hr>

        <div class="modal-body">
            <!-- Vertical Form -->
            <form  id="AddEventForm" enctype="multipart/form-data laravel" file="false" class="row g-3 needs-validation" novalidate>
              @csrf
                <div class="col-12">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="col-md-6">
                  <label for="date" class="col-sm-2 col-form-label">Date</label>
                  <input type="date" class="form-control" name="event_date" id="event_date" required>
                </div>
                
                <div class="col-md-6">
                  <label for="time" class="col-sm-2 col-form-label">Time</label>
                  <input type="time" class="form-control" name="event_time" id="event_time" required>
                </div>

                <div class="col-12">
                  <label for="description" class="form-label">Description</label>
                  {{-- <input type="text" class="form-control" name="description" id="description" required> --}}
                  <textarea class="form-control" name="description" id="description" required cols="20" rows="5"></textarea>
                </div>

                <div class="col-12">
                  <label for="image" class="form-label">Photo</label>
                  <input type="file" class="form-control" name="image" id="image" required>
                </div>

                

                

                <div class="text-center">
                  <button type="button" onclick="addData()" class="btn btn-outline-success btn-sm">Add</button>
                  <button type="reset" onclick="onCloseModal('AddEventForm')" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            <!-- Vertical Form -->
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->