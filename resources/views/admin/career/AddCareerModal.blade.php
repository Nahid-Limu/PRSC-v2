<!-- Vertically centered Modal -->
  <div class="modal fade" id="AddCareerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title"><i class='bx bxs-file-plus text-success'></i> Add Career</h5>
          <button type="button" onclick="onCloseModal('AddCareerForm')"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <span id="form_result"></span>
        <hr>

        <div class="modal-body">
            <!-- Vertical Form -->
            <form id="AddCareerForm" enctype="multipart/form-data laravel" file="false" class="row g-3 needs-validation" novalidate>
              @csrf

                <div class="col-12">
                  <label for="title" class="form-label">Job Title</label>
                  <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="col-md-6">
                  <label for="salart_start" class="form-label">Salary Range [Start]</label>
                  <input type="number" class="form-control" name="salary_start" id="salart_start" required>
                </div>
                <div class="col-md-6">
                  <label for="salart_end" class="form-label">Salary Range [End]</label>
                  <input type="number" class="form-control" name="salary_end" id="salart_end" required>
                </div>

                <div class="col-md-6">
                  <label for="deadline" class="form-label">Deadline</label>
                  <input type="date" class="form-control" name="deadline" id="deadline" required>
                </div>

                <div class="col-md-6">
                  <label for="vacancy" class="form-label">Vacancy</label>
                  <input type="number" class="form-control" name="vacancy" id="vacancy" required>
                </div>

                <div class="col-12">
                  <label for="description" class="form-label">Job Description</label>
                  <textarea class="form-control summerNote" name="description" id="description" required cols="20" rows="5"></textarea>
                </div>

                {{-- <div class="col-12">
                  <label for="document" class="form-label">Document</label>
                  <input type="file" class="form-control" name="document" id="document" required>
                </div> --}}

                <div class="text-center">
                  {{-- <button type="submit" class="btn btn-outline-success btn-sm">Add</button> --}}
                  <button type="button" onclick="addData()" class="btn btn-outline-success btn-sm">Add</button>
                  <button type="reset" onclick="onCloseModal('AddCareerForm')" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            <!-- Vertical Form -->
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  
  