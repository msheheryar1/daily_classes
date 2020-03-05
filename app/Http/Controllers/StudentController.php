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

    public function edit($id){
        $classes = Classes::all();
        $student = Student::find($id);
        return view('panel.student.edit',compact('classes','student'));
    }


  public function edit_do(Request $request){


    $student = Student::find($request->id);
    if($student->phone == $request->phone){
        $this->validate($request,[
            'student_name'=>'required|max:191',
            'father_name'=>'required|max:191',
            'dob'=>'required',
            'image'=>'mimes:png,jpg,jpeg,gif|max:50000',
            'phone'=>'required|max:15',
            'cnic'=>'required|max:15',
            'class_id'=>'required',
            'section_id'=>'required'
        ]);
   
    }
    else{
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
 
    }
       


        $image_name = $student->image;
        if($request->has('image')){
            $image_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/media/student_pictures',$image_name);
        }

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




    public function view(){

    	$data = Student::join('classes','classes.id','students.class_id')
    					->join('sections','sections.id','students.section_id')
    					->select('students.*','classes.name as class_name','sections.name as section_name')
    					->get();

    	return view('panel.student.view',compact('data'));				

    }


    public function view_full($id){
        $student = Student::join('classes','classes.id','students.class_id')
                        ->join('sections','sections.id','students.section_id')
                        ->select('students.*','classes.name as class_name','sections.name as section_name')
                        ->where('students.id',$id)
                        ->first();
        return view('panel.student.view_full',compact('student'));                
    }
}
