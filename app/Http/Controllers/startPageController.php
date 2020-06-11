<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Team;

class startPageController extends Controller
{
    public function startpage(){

  $activities = activity::all();
  $teams = team::all();
    return view('users.startpage', [
        'activities'=>$activities, 
        'teams'=>$teams
        ]);
    }
}
