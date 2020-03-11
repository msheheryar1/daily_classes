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


    public function view(){
    	$classes = Classes::all();
    	$attendance='';
    	if(isset($_GET['search'])){

    		$class_id = $_GET['class_id'];
    		$section_id = $_GET['section_id'];
    		$from_date = $_GET['from_date'];
    		$to_date = $_GET['to_date'];

    		$attendance = Attendance::get_attendance($class_id,$section_id,$from_date,$to_date);


    	}

    	return view('panel.attendances.view',compact('classes','attendance'));
    }

    public function get_students(Request $request){
    	$data = Student::get_students($request->class_id,$request->section_id);

    	return json_encode($data);

    }
}
