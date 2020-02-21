@extends('panel.layout.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Class Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@php $count=0; @endphp
	                @forelse($class as $myclass)
	                @php $count++ @endphp
	                	<tr>
		                  <td>{{$count}}</td>
		                  <td>{{$myclass->name}}
		                  </td>
		                  <td>{{$myclass->created_at}}</td>
		                  <td>
		                  	<a href="{{route('class_edit',$myclass->id)}}" class="btn btn-primary">Edit</a>
		                  	{{-- <button class="btn btn-primary">Edit</button> --}}
		                  </td>
		                </tr>

	                @empty
	                "No Data Found"
	                @endforelse
	                
            	</tbody>
    			<tfoot>
                <tr>
                  <th>#</th>
                  <th>Class Name</th>
                  <th>Created At</th>
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