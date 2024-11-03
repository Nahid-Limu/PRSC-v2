@extends('layouts.appAdmin')

@section('title', 'NoticeList')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Notice</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Notice</li>
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
                    
                  <h6 class="m-0 font-weight-bold text-primary"><i class='bx bxs-user-detail'> Notice LIST</i></h6>
                    
                  {{-- flash Message --}}
                    <div id="success_message" class="alert alert-success alert-dismissible fade" role="alert"></div>
                  {{-- flash Message --}}

                  <div class="dropdown no-arrow">
                    <button type="button" class="btn btn-sm btn-outline-success " data-bs-toggle="modal"  data-bs-target="#AddNoticeModal"><i class='bx bxs-file-plus'></i> Add Notice</button>
                  </div>

                </div>

                <!-- Table with stripped rows -->
                <table class="table table-responsive" id="NoticeListTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Date</th>
                      <th scope="col">Description</th>
                      <th scope="col">Document</th>
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

      @include('admin.notice.AddNoticeModal')
      @include('admin.notice.editNoticeModal')

      @include('include.admin.deleteModal')

</main><!-- End #main -->

@endsection

@section('script')
<script>

  //Table Data
  $('#NoticeListTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        "order": [[ 0, "asc" ]],
        ajax:{
        url: "{{ route('noticeList') }}",
        },
        columns:[
          { 
              data: 'DT_RowIndex', 
              name: 'DT_RowIndex' 
          },
          {
              data: 'title',
              name: 'title'
          },
          {
              data: 'pulish_date',
              name: 'pulish_date'
          },
          {
              data: 'description',
              name: 'description'
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

    var form = $('#AddNoticeForm')[0];
    var formdata = new FormData(form);

    $.ajax({
            url:"{{ route('noticeAdd') }}",
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
                $('#NoticeListTable').DataTable().ajax.reload();
                $('#AddNoticeModal').modal('hide');
                $("#AddNoticeForm").trigger("reset");
                // $('#description').code('');
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
          url: "{{url('noticeDelete')}}"+"/"+id,
          success: function (response) {
              // console.log(response);
              if (response.success) {
                      
                $("#success_message").text(response.success);
                $('#NoticeListTable').DataTable().ajax.reload();
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
    $("#EditNoticeForm").trigger("reset");
    description
    $.ajax({
        type: 'GET',
        url: "{{url('noticeEdit')}}"+"/"+id,
        // dataType: "html",
        success: function (response) {
            // console.log(response);
            if (response) {
              
              $('#edit_data_id').val(response.id);
              $('#edit_title').val(response.title);
              $('#edit_pulish_date').val(response.pulish_date);
              $('#edit_description').summernote('code', response.description);
              // $("#imageView").attr("src", "assets/img/events/"+ response.image);
              
            }

        },error:function(){ 
            console.log(response);
        }
    });
  }

  //Update Table Data
  function updateData(params) {
    // alert();
    var form = $('#EditNoticeForm')[0];
    var formdata = new FormData(form);
    $.ajax({
            url:"{{ route('noticeUpdate') }}",
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
                $('#NoticeListTable').DataTable().ajax.reload();
                $('#EditNoticeModal').modal('hide');
                
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