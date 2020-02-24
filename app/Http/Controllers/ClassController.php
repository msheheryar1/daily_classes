<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
class ClassController extends Controller
{
    //
    public function add(){
    	return view('panel.classes.add');
    }

    public function add_do(Request $request){

    	$class  = new Classes();
    	$class->name = $request->class;
    	$class->save();

    	return redirect()->back();
    }

    public function view(){

    	$class = Classes::all();

    	return view('panel.classes.view',compact('class'));
    }
    public function edit($id){
    	$class = Classes::find($id);
    	return view('panel.classes.edit',compact('class'));
    }

    public function edit_do(Request $request){
    	$class = Classes::find($request->id)->update([
    		'name'=>$request->class
    	]);

    	return redirect()->route('class_view');
    }
    
}
