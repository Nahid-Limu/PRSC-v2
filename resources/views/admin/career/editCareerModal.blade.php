<!-- Vertically centered Modal -->
  <div class="modal fade" id="EditCareerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-edit text-success'></i> Edit Career</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="EditCareerForm" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <input type="hidden" id="edit_data_id" name="id">

                <div class="col-12">
                  <label for="title" class="form-label">Job Title</label>
                  <input type="text" class="form-control" name="title" id="edit_title" required>
                </div>

                <div class="col-md-6">
                  <label for="salart_start" class="form-label">Salary Range [Start]</label>
                  <input type="number" class="form-control" name="salary_start" id="edit_salary_start" required>
                </div>
                <div class="col-md-6">
                  <label for="salart_end" class="form-label">Salary Range [End]</label>
                  <input type="number" class="form-control" name="salary_end" id="edit_salary_end" required>
                </div>

                <div class="col-md-6">
                  <label for="deadline" class="form-label">Deadline</label>
                  <input type="date" class="form-control" name="deadline" id="edit_deadline" required>
                </div>

                <div class="col-md-6">
                  <label for="vacancy" class="form-label">Vacancy</label>
                  <input type="number" class="form-control" name="vacancy" id="edit_vacancy" required>
                </div>

                <div class="col-12">
                  <label for="description" class="form-label">Job Description</label>
                  <textarea class="form-control summerNote" name="description" id="edit_description" required cols="20" rows="5"></textarea>
                </div>

                {{-- <div class="col-12">
                  <label for="document" class="form-label">Document</label>
                  <input type="file" class="form-control" name="document" id="document" required>
                </div> --}}

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