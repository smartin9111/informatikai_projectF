<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserIndex(){
		return view('user.user_index');
	}
}
