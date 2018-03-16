<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamHasCourse;
use App\Models\TeamHasUser;
use Illuminate\Http\Request;

class TeamHasCourseController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::all();
        if (!empty($request->team_id)) {
            $teamHasCourse = TeamHasCourse::where('team_id', $request->team_id)->get();
        } else {
            $teamHasCourse = collect([]);
        }
        return view('teamHasCourses.index', ['teamHasCourse' => $teamHasCourse, 'teams' => $teams]);
    }
}
