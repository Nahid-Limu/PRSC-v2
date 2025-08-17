<!-- Vertically centered Modal -->
  <div class="modal fade" id="EditTeacherModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-edit text-success'></i> Edit Teacher</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="EditTeacherForm" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <input type="hidden" id="edit_data_id" name="id">
                <div class="col-12">
                  <label for="name" class="form-label">Teacher Name</label>
                  <input type="text" class="form-control" name="name" id="edit_name" required>
                </div>

                <div class="col-12">
                  <label for="designation" class="form-label">Designation</label>
                  <input type="text" class="form-control" name="designation" id="edit_designation" required>
                </div>

                <div class="col-12">
                  <label for="teachersWords" class="form-label">Teachers Words</label>
                  <input type="text" class="form-control" name="teachers_words" id="edit_teachers_words" required>
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
                  <button type="submit" onclick="updateData()" class="btn btn-outline-success btn-sm">Update</button>
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