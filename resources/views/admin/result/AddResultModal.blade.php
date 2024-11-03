<!-- Vertically centered Modal -->
  <div class="modal fade" id="AddResultModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-file-plus text-success'></i> Add Result</h5>
          <button type="button" onclick="onCloseModal('AddResultForm')"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <span id="form_result"></span>
        <hr>

        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="AddResultForm" enctype="multipart/form-data laravel" file="false" class="row g-3 needs-validation" novalidate>
              @csrf

                <div class="col-12">
                  <label for="class" class="form-label">Class</label>
                  <input type="text" class="form-control" name="class" id="class" required>
                </div>

                <div class="col-12">
                  <label for="exam_name" class="form-label">Exam Name</label>
                  <input type="text" class="form-control" name="exam_name" id="exam_name" required>
                </div>

                <div class="col-12">
                  <label for="document" class="form-label">Result Sheet</label>
                  <input type="file" class="form-control" name="document" id="document" required>
                </div>

                <div class="text-center">
                  <button type="button" onclick="addData()" class="btn btn-outline-success btn-sm">Add</button>
                  <button type="reset" onclick="onCloseModal('AddResultForm')" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            <!-- Vertical Form -->
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  
  