<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //


	static function get_students($class_id,$section_id){

		return self::where('class_id',$class_id)->where('section_id',$section_id)->orderBy('name','asc')->get();

	}

}
