<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Section;
class SectionController extends Controller
{
    //
    public function add(){
    	$classes = Classes::orderBy('name','asc')->get();
    	return view('panel.sections.add',compact('classes'));
    }

    public function add_do(Request $request){

    	$section  = new Section();
    	$section->class_id = $request->class_id;
    	$section->name = $request->section;
    	$section->save();

    	return redirect()->back();
    }

    public function edit($id){
    	$classes = Classes::orderBy('name','asc')->get();
    	$section = Section::find($id);
    	return view('panel.sections.edit',compact('section','classes'));
    }

    public function edit_do(Request $request){
    	$section  = Section::find($request->id)->update([
    		'class_id'=>$request->class_id,
    		'name'=>$request->section,
    	]);

    	return redirect()->route('section_view');
    }

    public function view(){
    	$data = Section::join('classes','classes.id','sections.class_id')
    					->select('sections.*','classes.name as class_name')
    					->get();

    	return view('panel.sections.view',compact('data'));				
    }


    public function delete($id){
    	Section::find($id)->delete();

    	return redirect()->back();
    }
}
