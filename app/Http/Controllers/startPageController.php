<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activity;

class startPageController extends Controller
{
    public function startpage(){
        
        $activities = Activity::all();
        return view('users.startpage', ['activities'=>$activities]);
    }

}
