<!-- Vertically centered Modal -->
  <div class="modal fade" id="EditResultModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-edit text-success'></i> Edit Result</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="EditResultForm" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <input type="hidden" id="edit_data_id" name="id">

                <div class="col-12">
                  <label for="edit_class" class="form-label">Class</label>
                  <input type="text" class="form-control" name="class" id="edit_class" required>
                </div>

                <div class="col-12">
                  <label for="edit_exam_name" class="form-label">Exam Name</label>
                  <input type="text" class="form-control" name="exam_name" id="edit_exam_name" required>
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