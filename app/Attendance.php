<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AttendanceRecord;
class Attendance extends Model
{
    //

    protected $fillable = [
    	'date','time','status','class_id','section_id'
    ];

    static function add_attendance($request){

    	$a = self::create([
    		'date' =>$request->date,
    		'time'=>$request->time,
    		'status'=>$request->status,
    		'class_id'=>$request->class_id,
    		'section_id'=>$request->section_id
    	]);

    	AttendanceRecord::add_record($request->student,$a->id);

    	return redirect()->back();


    }


}
