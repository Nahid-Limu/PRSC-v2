@extends('layouts.appAdmin')

@section('title', 'ResultList')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Result</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Result</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    
                  <h6 class="m-0 font-weight-bold text-primary"><i class='bx bxs-user-detail'> Result LIST</i></h6>
                    
                  {{-- flash Message --}}
                    <div id="success_message" class="alert alert-success alert-dismissible fade" role="alert"></div>
                  {{-- flash Message --}}

                  <div class="dropdown no-arrow">
                    <button type="button" class="btn btn-sm btn-outline-success " data-bs-toggle="modal"  data-bs-target="#AddResultModal"><i class='bx bxs-file-plus'></i> Add Result</button>
                  </div>

                </div>

                <!-- Table with stripped rows -->
                <table class="table table-responsive" id="ResultistTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Class</th>
                      <th scope="col">Exam Name</th>
                      <th scope="col">Year</th>
                      <th scope="col">Result Sheet</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
    </section>

      @include('admin.result.AddResultModal')
      @include('admin.result.editResultModal')

      @include('include.admin.deleteModal')

</main><!-- End #main -->

@endsection

@section('script')
<script>

  //Table Data
  $('#ResultistTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        ajax:{
        url: "{{ route('resultList') }}",
        },
        columns:[
          { 
              data: 'DT_RowIndex', 
              name: 'DT_RowIndex' 
          },
          {
              data: 'class',
              name: 'class'
          },
          {
              data: 'exam_name',
              name: 'exam_name'
          },
          {
              data: 'result_year',
              name: 'result_year'
          },
          {
              data: 'document',
              name: 'document'
          },
          {
              data: 'action',
              name: 'action',
              orderable: false
          }
        ]
  });

  //Add Table Data
  function addData() {

    var form = $('#AddResultForm')[0];
    var formdata = new FormData(form);

    $.ajax({
            url:"{{ route('resultAdd') }}",
            method:"POST",
            data:formdata,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
              // console.log(response);

              // validation
              var html = '';
              if(response.errors)
              {
                html = '<div class="alert alert-danger">';
                for(var count = 0; count < response.errors.length; count++)
                {
                html += '<p>' + response.errors[count] + '</p>';
                }
                html += '</div>';
                
              }
              $('#form_result').html(html);

              //success
              if (response.success) {
                
                $("#success_message").text(response.success);
                $('#ResultistTable').DataTable().ajax.reload();
                $('#AddResultModal').modal('hide');
                $("#AddResultForm").trigger("reset");
                // alert(response.success);
                SuccessMsg();
              }

            },
            error: function(response) {
                // console.log(response);
            }
    })

  }

  //Delete Table Data
  function deleteTableData(id) {
      // alert(121);
      $.ajax({
          type: 'GET',
          url: "{{url('resultDelete')}}"+"/"+id,
          success: function (response) {
              // console.log(response);
              if (response.success) {
                      
                $("#success_message").text(response.success);
                $('#ResultistTable').DataTable().ajax.reload();
                $('#DeleteModal').modal('hide');

                SuccessMsg();
              }

          },error:function(){ 
              console.log(response);
          }
      });
  }

  //Edit Table Data
  function editData(id) {
    // alert(id);
    $("#EditResultForm").trigger("reset");
    $.ajax({
        type: 'GET',
        url: "{{url('resultEdit')}}"+"/"+id,
        // dataType: "html",
        success: function (response) {
            // console.log(response);
            if (response) {
              
              $('#edit_data_id').val(response.id);
              $('#edit_class').val(response.class);
              $('#edit_exam_name').val(response.exam_name);
              
            }

        },error:function(){ 
            console.log(response);
        }
    });
  }

  //Update Table Data
  function updateData(params) {
    // alert();
    var form = $('#EditResultForm')[0];
    var formdata = new FormData(form);
    $.ajax({
            url:"{{ route('resultUpdate') }}",
            method:"POST",
            data:formdata,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
              // console.log(response);
              if (response.success) {
                
                $("#success_message").text(response.success);
                $('#ResultistTable').DataTable().ajax.reload();
                $('#EditResultModal').modal('hide');
                
                SuccessMsg();
              }
            },
            error: function(response) {
                // console.log(response);
            }
    })
  }

</script>


@endsection