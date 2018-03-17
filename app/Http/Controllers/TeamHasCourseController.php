<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Team;
use App\Models\TeamHasCourse;
use App\Models\TeamHasUser;
use Illuminate\Http\Request;

class TeamHasCourseController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::all();
        $courses = Course::all();
        if (!empty($request->team_id)) {
            $teamHasCourses = TeamHasCourse::where('team_id', $request->team_id)->get();
        } else {
            $teamHasCourses = collect([]);
        }
        return view('teamHasCourses.index', [
            'teamHasCourses' => $teamHasCourses,
            'teams' => $teams,
            'courses' => $courses
        ]);
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
            'day' => $request->day,
            'num' => $request->num
        ])->first();
        if (empty($teamHasCourse)) {
            $create = TeamHasCourse::create([
                'team_id' => $request->team_id,
                'day' => $request->day,
                'num' => $request->num,
                'course_id' => $request->course_id,
            ]);
            if (empty($create))
                return response()->json(['StatusCode' => 500, 'ResultData' => '设置失败，请联系管理员']);
            return response()->json(['StatusCode' => 200, 'ResultData' => '设置成功']);
        }

        if ($teamHasCourse->course_id != $request->course_id) {
            $teamHasCourse->course_id = $request->course_id;
            $teamHasCourse->save();
        }
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
