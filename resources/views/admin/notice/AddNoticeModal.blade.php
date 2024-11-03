<!-- Vertically centered Modal -->
  <div class="modal fade" id="AddNoticeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-file-plus text-success'></i> Add Notice</h5>
          <button type="button" onclick="onCloseModal('AddNoticeForm')"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <span id="form_result"></span>
        <hr>

        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="AddNoticeForm" enctype="multipart/form-data laravel" file="false" class="row g-3 needs-validation" novalidate>
              @csrf

                <div class="col-12">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="col-12">
                  <label for="pulish_date" class="form-label">Publish Date</label>
                  <input type="date" class="form-control" name="pulish_date" id="pulish_date" required>
                </div>

                <div class="col-12">
                  <label for="description" class="form-label">Description</label>
                  {{-- <textarea class="form-control" name="description" id="description" required cols="20" rows="5"></textarea> --}}
                  <textarea class="form-control summerNote" name="description" id="description" required cols="20" rows="5"></textarea>
                </div>

                <div class="col-12">
                  <label for="document" class="form-label">Document</label>
                  <input type="file" class="form-control" name="document" id="document" required>
                </div>

                <div class="text-center">
                  {{-- <button type="submit" class="btn btn-outline-success btn-sm">Add</button> --}}
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

  
  