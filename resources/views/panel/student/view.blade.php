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
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Edit Student</li>
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
                  <th>Father Name</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@php $count=0; @endphp
	                @forelse($data as $mystudent)
	                @php $count++ @endphp
	                	<tr>
		                  <td>{{$count}}</td>
                      <td>{{$mystudent->name}}</td>
                      <td>{{$mystudent->father_name}}</td>
		                  <td>{{$mystudent->class_name}}
		                  </td>
                      <td>{{$mystudent->section_name}}
                      </td>
		                  <td>
		                  	<a href="{{route('students_edit',$mystudent->id)}}" class="btn btn-primary">Edit</a>
		                    <a href="{{route('students_view_full',$mystudent->id)}}" class="btn btn-info">View Full</a>
                      	<a href="{{route('students_delete',$mystudent->id)}}" class="btn btn-danger">Delete</a>
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
                  <th>Father Name</th>
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