@extends('panel.layout.master')

@section('content')


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>General Form</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admission Form</a></li>
              <li class="breadcrumb-item active">Add Student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('students_add_do')}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                   @if($errors->any())
                      @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                      @endforeach

                    @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name*</label>
                    <input type="text" class="form-control" required="" name="student_name" id="exampleInputEmail1" placeholder="Enter Student Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Father Name*</label>
                    <input type="text" class="form-control" required="" name="father_name" id="exampleInputEmail1" placeholder="Enter Student Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">DOB*</label>
                    <input type="date" class="form-control" required="" name="dob" id="exampleInputEmail1" placeholder="Enter Student Name">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" accept=".png,.jpg,.jpeg,.gif" name="image" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" maxlength="11" class="form-control" required="" name="phone" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">CNIC</label>
                    <input type="text" class="form-control" required="" name="cnic" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <select class="form-control class_select" required="" name="class_id">
                      <option>Please Select a class</option>
                      @forelse($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                      @empty
                      "No class found"

                      @endforelse
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Section</label>
                    <select class="form-control section_select" required="" name="section_id">
                      <option value="">Please Select Section</option> 

                    </select>
                  </div>
                  

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

         
          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
  

$('.class_select').change(function(){


  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content'),
    }
  });

  $.ajax({
    url:'{{route('get_sections')}}',
    method:'POST',
    data:{
      class_id: $(this).val(),
    },
    success:(response)=>{
      response = JSON.parse(response);
      $(".section_select").html('');
      for(i in response){
        $(".section_select").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
      }

    }

  });





});


</script>


@endsection