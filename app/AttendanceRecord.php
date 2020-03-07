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
}
