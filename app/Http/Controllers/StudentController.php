<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Student;
class StudentController extends Controller
{
    //
    public function add(){
    	$classes = Classes::all();
    	return view('panel.student.add',compact('classes'));
    }

    public function add_do(Request $request){

    	$this->validate($request,[
    		'student_name'=>'required|max:191',
    		'father_name'=>'required|max:191',
    		'dob'=>'required',
    		'image'=>'mimes:png,jpg,jpeg,gif|max:50000',
    		'phone'=>'required|unique:students|max:15',
    		'cnic'=>'required|max:15',
    		'class_id'=>'required',
    		'section_id'=>'required'
    	]);



    	$image_name = '';
    	if($request->has('image')){
    		$image_name = time().'.'.$request->file('image')->getClientOriginalExtension();
    		$request->file('image')->move(public_path().'/media/student_pictures',$image_name);
    	}

    	$student = new Student();
    	$student->name= $request->student_name;
    	$student->father_name= $request->father_name;
    	$student->dob=  $request->dob;
    	$student->image = $image_name;
    	$student->phone = $request->phone;
    	$student->cnic = $request->cnic;
    	$student->class_id = $request->class_id;
    	$student->section_id = $request->section_id;
    	$student->save();

    	return redirect()->back();
    	
    	





    }
}
