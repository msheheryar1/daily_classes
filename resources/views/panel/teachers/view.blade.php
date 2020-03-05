@extends('panel.layout.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>DataTables</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Teacher</a></li>
              <li class="breadcrumb-item active">Edit Teacher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Basic Salary</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@php $count=0; @endphp
	                @forelse($data as $myteacher)
	                @php $count++ @endphp
	                	<tr>
		                  <td>{{$count}}</td>
                      <td>{{$myteacher->name}}</td>
                      <td>{{$myteacher->basic_salary}}</td>
                      <td>{{$myteacher->phone}}</td>
                      <td><img width="50px" src="{{asset('media/teacher_pictures')}}/{{$myteacher->image}}"> </td>
		                  <td>{{$myteacher->class_name}}
		                  </td>
                      <td>{{$myteacher->section_name}}
                      </td>
		                  <td>
		                  	<a href="{{route('teachers_edit',$myteacher->id)}}" class="btn btn-primary">Edit</a>
		                    <a href="{{route('teachers_view_full',$myteacher->id)}}" class="btn btn-info">View Full</a>
                      	<a href="{{route('teachers_delete',$myteacher->id)}}" class="btn btn-danger">Delete</a>
		                  </td>
		                </tr>

	                @empty
	                "No Data Found"
	                @endforelse
	                
            	</tbody>
    			<tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Basic Salary</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Class</th>
                  <th>Section</th>
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
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection