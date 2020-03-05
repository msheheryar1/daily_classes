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
              <li class="breadcrumb-item"><a href="#">Student </a></li>
              {{-- <li class="breadcrumb-item active">Edit Student</li> --}}
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
              
              <p>Name:  {{$student->name}} </p>
              
              <p>Father Name:  {{$student->father_name}}</p>
              
              <p>Date Of Birth:  {{date_format(date_create($student->dob),'jS F, Y')}}</p>

              <p>Class: {{$student->class_name}} </p>

              <p>Section:  {{$student->section_name}}</p>

              <p>Image: <img width="100px" src="{{asset('media/student_pictures')}}/{{$student->image}}"> </p>

              <p>cnic:  {{$student->cnic}}</p>

              <p>phone:  {{$student->phone}}</p>


              
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