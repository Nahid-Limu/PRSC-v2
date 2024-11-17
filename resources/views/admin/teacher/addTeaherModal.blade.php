<!-- Vertically centered Modal -->
  <div class="modal fade" id="AddTeacherModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-file-plus text-success'></i> Add Teacher</h5>
          <button type="button" onclick="onCloseModal('AddTeacherForm')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <span id="form_result"></span>
        <hr>

        <div class="modal-body">
            <!-- Vertical Form -->
            <form  id="AddTeacherForm" enctype="multipart/form-data laravel" file="false" class="row g-3 needs-validation" novalidate>
              @csrf
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="col-12">
                  <label for="designation" class="form-label">Designation</label>
                  <input type="text" class="form-control" name="designation" id="designation" required>
                </div>

                <div class="col-12">
                  <label for="teachersWords" class="form-label">Teachers Words</label>
                  <input type="text" class="form-control" name="teachers_words" id="teachers_words" required>
                </div>

                <div class="col-12">
                    <label for="image" class="form-label">Photo</label>
                    {{-- Preview an image before  --}}
                      <img src="assets/img/imagePlaceholder.jpg" class="w-50" style="padding-bottom: 18px; width: 266px; height: 190px;" id="imgPreview">
                    {{-- Preview an image before  --}}
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>

                <div class="text-center">
                  <button type="button" onclick="addData()" class="btn btn-outline-success btn-sm">Add</button>
                  <button type="reset" onclick="onCloseModal('AddTeacherForm')" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            <!-- Vertical Form -->
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->