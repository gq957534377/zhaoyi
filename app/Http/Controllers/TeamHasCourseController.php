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

    /**
     * 说明: 添加或者修改课程
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function store(Request $request)
    {
        $teamHasCourse = TeamHasCourse::where([
            'team_id' => $request->team_id,
            'course_id' => $request->course_id,
            'day' => $request->day,
            'num' => $request->num
        ])->first();
        if (empty($teamHasCourse))
            return response()->json(['StatusCode' => 404, 'ResultData' => '没有这条记录']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '设置成功']);

    }

    /**
     * 说明: 删除课程
     *
     * @param TeamHasCourse $teamHasCourse
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 郭庆
     */
    public function destroy(TeamHasCourse $teamHasCourse, Request $request)
    {
        if (empty($teamHasCourse->delete())) return response()->json(['StatusCode' => 404, 'ResultData' => '没有这条记录']);
        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功']);
    }
}
