<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Student;
use App\Attendance;
class AttendanceController extends Controller
{
    //
    public function add(){
    	$classes = Classes::all();
    	
    	return view('panel.attendances.add',compact('classes'));
    }

    public function add_do(Request $request){

    	$attendace = Attendance::add_attendance($request);

    	return $attendace;
    }

    public function get_students(Request $request){
    	$data = Student::get_students($request->class_id,$request->section_id);

    	return json_encode($data);

    }
}
