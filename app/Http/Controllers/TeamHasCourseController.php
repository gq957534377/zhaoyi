<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamHasCourseController extends Controller
{
    public function index()
    {
        return view('teamHasCourses.index');
    }
}
