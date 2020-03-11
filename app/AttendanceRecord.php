<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    //
    protected $table = 'attendance-records';

    protected $fillable = ['a_id','student_id'];

    static function add_record($students,$a_id){

    	foreach ($students as $student) {
    		self::create([
    			'a_id'=>$a_id,
    			'student_id'=>$student
    		]);
    	}




    }

    static function get_records($a_ids){


    	return self::join('attendances','attendances.id','attendance-records.a_id')
    		->join('students','students.id','attendance-records.student_id')
    		->select('students.name','attendances.status')
    		->whereIn('attendances.id',$a_ids)
    		->get();

    }

}
