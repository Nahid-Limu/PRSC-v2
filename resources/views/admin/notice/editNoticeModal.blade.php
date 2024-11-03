<!-- Vertically centered Modal -->
  <div class="modal fade" id="EditNoticeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-edit text-success'></i> Edit Notice</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="EditNoticeForm" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <input type="hidden" id="edit_data_id" name="id">

                <div class="col-12">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="edit_title" required>
                </div>

                <div class="col-12">
                  <label for="pulish_date" class="form-label">Publish Date</label>
                  <input type="date" class="form-control" name="pulish_date" id="edit_pulish_date" required>
                </div>

                <div class="col-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control summerNote" name="description" id="edit_description" required cols="20" rows="5"></textarea>
                </div>

                <div class="col-12">
                  <label for="document" class="form-label">Document</label>
                  <input type="file" class="form-control" name="document" id="document" >
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