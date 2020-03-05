<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Teacher;
class TeacherController extends Controller
{
    //
    public function add(){
    	$classes = Classes::all();
    	return view('panel.teachers.add',compact('classes'));
    }

    public function add_do(Request $request){

    	$this->validate($request,[
    		'name'=>'required|max:191',
    		'basic_salary'=>'required|max:191',
    		'image'=>'mimes:png,jpg,jpeg,gif|max:50000',
    		'phone'=>'required|unique:students|max:15',
    		'class_id'=>'required',
    		'section_id'=>'required'
    	]);



    	$image_name = '';
    	if($request->has('image')){
    		$image_name = time().'.'.$request->file('image')->getClientOriginalExtension();
    		$request->file('image')->move(public_path().'/media/teacher_pictures',$image_name);
    	}

    	$teacher = new Teacher();
    	$teacher->name= $request->name;
    	$teacher->basic_salary= $request->basic_salary;
    	$teacher->image = $image_name;
    	$teacher->phone = $request->phone;
    	$teacher->class_id = $request->class_id;
    	$teacher->section_id = $request->section_id;
    	$teacher->save();

    	return redirect()->back();
    }

    public function edit($id){
        $classes = Classes::all();
        $teacher = Teacher::find($id);
        return view('panel.teachers.edit',compact('classes','teacher'));
    }


  public function edit_do(Request $request){


    $teacher = Student::find($request->id);
    if($teacher->phone == $request->phone){
        $this->validate($request,[
            'name'=>'required|max:191',
    		'basic_salary'=>'required|max:191',
    		'image'=>'mimes:png,jpg,jpeg,gif|max:50000',
    		'phone'=>'required|max:15',
    		'class_id'=>'required',
    		'section_id'=>'required'
        ]);
   
    }
    else{
        $this->validate($request,[
            'name'=>'required|max:191',
    		'basic_salary'=>'required|max:191',
    		'image'=>'mimes:png,jpg,jpeg,gif|max:50000',
    		'phone'=>'required|unique:teachers|max:15',
    		'class_id'=>'required',
    		'section_id'=>'required'
        ]);
 
    }
       


        $image_name = $teacher->image;
        if($request->has('image')){
            $image_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/media/teacher_pictures',$image_name);
        }

        $teacher->name= $request->name;
        $teacher->basic_salary= $request->basic_salary;
        $teacher->image = $image_name;
        $teacher->phone = $request->phone;
        $teacher->class_id = $request->class_id;
        $teacher->section_id = $request->section_id;
        $teacher->save();

        return redirect()->back();
    }




    public function view(){

    	$data = Teacher::join('classes','classes.id','teachers.class_id')
    					->join('sections','sections.id','teachers.section_id')
    					->select('teachers.*','classes.name as class_name','sections.name as section_name')
    					->get();

    	return view('panel.teachers.view',compact('data'));				

    }


    public function view_full($id){
        $teacher = Teacher::join('classes','classes.id','teachers.class_id')
                        ->join('sections','sections.id','teachers.section_id')
                        ->select('teachers.*','classes.name as class_name','sections.name as section_name')
                        ->where('teachers.id',$id)
                        ->first();
        return view('panel.teachers.view_full',compact('teachers'));                
    }
}
