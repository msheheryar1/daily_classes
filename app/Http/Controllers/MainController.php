<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use App\Product;

class MainController extends Controller
{
    //
    public function index(){
    	// $users = User::all();
    	// $data = [
    	// 	'name'=>'usman123',
    	// 	'email'=>'usman321@gmail.com',
    	// 	'password'=>bcrypt('abc123'),
    	// 	'role'=>1
    	// ];

    	// User::create($data);
    	// $user = new User();
    	// $user->name = 'Usman';
    	// $user->email = 'usman123@gmail.com';
    	// $user->password = bcrypt('abc123');
    	// $user->role = 1;
    	// $user->save();

    	// User::where('name','muneer456')->update([
    	// 	'name'=>'muneer'
    	// ]);

    	User::find(2)->delete();



    }
}
