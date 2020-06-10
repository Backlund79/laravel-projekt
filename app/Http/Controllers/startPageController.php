<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class startPageController extends Controller
{
    public function startpage(){
        return view('users.startpage');
    }
}
