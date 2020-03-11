@extends('panel.layout.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

      <form action="" class="form">
    <div class="row">
      <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Class</label>
                    <select class="form-control class_select" required="" name="class_id">
                      <option>Please Select a class</option>
                      @forelse($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                      @empty
                      "No class found"

                      @endforelse
                    </select>
                  </div>
      </div>
      <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Section</label>
                    <select class="form-control section_select" required="" name="section_id">
                      <option value="">Please Select Section</option> 

                    </select>
                  </div>
      </div>
      <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">From Date</label>
                    <input type="date" name="from_date" class="form-control">
                  </div>
      </div>
      <div class="col-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">To Date</label>
                    <input type="date" name="to_date" class="form-control">
                  </div>
      </div>
      <div class="col-3">
        <button class="btn btn-sm btn-success" name="search" type="submit">Get</button>
      </div>
    </div>
    </form>
    @if($attendance!='')
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Attendance</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Student</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@php $count=0; @endphp
	                @forelse($attendance as $myattendance)
	                @php $count++ @endphp
	                	<tr>
		                  <td>{{$count}}</td>
		                  <td>{{$myattendance->name}}
		                  </td>
                      @if($myattendance->status=='present')
                      <td><span class="badge badge-success">{{$myattendance->status}}</span></td>
                      @elseif($myattendance->status=='absent')
                      <td><span class="badge badge-danger">{{$myattendance->status}}</span></td>
                      @else
                      <td><span class="badge badge-warning">{{$myattendance->status}}</span></td>
                      @endif

		                  
		                  <td>
		                  	{{-- <a href="{{route('class_edit',$myclass->id)}}" class="btn btn-primary">Edit</a> --}}
		                  	
		                  </td>
		                </tr>

	                @empty
	                "No Data Found"
	                @endforelse
	                
            	</tbody>
    			<tfoot>
                <tr>
                  <th>#</th>
                  <th>Student</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    @endif
      <!-- /.row -->
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