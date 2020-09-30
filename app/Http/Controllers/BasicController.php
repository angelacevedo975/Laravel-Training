<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function getUserAge(Request $request){
        if($request->age)
            return "Your age is ".$request->age;
        return "Your age is not setted";
    }

    public function getUserName(Request $request){
        return "your name is ".$request->name;
    }
}
