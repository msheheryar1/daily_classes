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

    static function get_attendance($class_id,$section_id,$from_date,$to_date){
    	$a_ids = self::where('class_id',$class_id)
    		->where('section_id',$section_id)
    		->where('created_at','>',$from_date.' 00:00:00')
    		->where('created_at','<=',$to_date.' 23:59:59')
    		->pluck('id');

    	return AttendanceRecord::get_records($a_ids);
    		
    		


    }


}
