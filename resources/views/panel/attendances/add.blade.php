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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Take Attendance</li>
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
                <h3 class="card-title">Take Attendance</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('attendances_add_do')}}" method="post">
              	@csrf
                <div class="card-body row">
                  



                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" name="date" class="form-control">
                  </div>


                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="time" name="time"  class="form-control">
                  </div>


                  <div class="form-group col-lg-6">
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


                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Section</label>
                    <select class="form-control section_select" required="" name="section_id">
                      <option value="">Please Select Section</option> 

                    </select>
                  </div>


                  <div class="form-group col-lg-6 students_main">
                    <label for="exampleInputEmail1">Students</label>
                    
                  </div>

                    <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" required="" name="status">
                      <option value="">Please Select Section</option> 
                      <option value="present">Present</option>
                      <option value="absent">Absent</option>
                      <option value="leave">Leave</option>
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
       $(".section_select").append("<option value=''>Please select section</option>");
      for(i in response){
        $(".section_select").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
      }

    }

  });





});

$(".section_select").change(function(){

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content'),
    }
  });

  $.ajax({
    url:'{{route('get_students')}}',
    method:'POST',
    data:{
      class_id: $(".class_select").val(),
      section_id: $(this).val(),
    },
    success:(response)=>{
      response = JSON.parse(response);
      $(".students_main").html('');
      for(i in response){
        $(".students_main").append("<p><input id='student"+response[i].id+"' type='checkbox' value='"+response[i].id+"' name='student[]'><label for='student"+response[i].id+"'>"+response[i].name+"</label></p>");
      }

    }

  });




});

</script>


@endsection