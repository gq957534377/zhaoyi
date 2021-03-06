<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Team;
use App\Models\TeamHasCourse;
use App\Models\TeamHasUser;
use Illuminate\Http\Request;
use Qiniu\Auth;
use Spatie\Permission\Models\Role;

class TeamHasCourseController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::all();
        $courses = Course::all();

        if (!empty($request->team_id)) {
            $teamHasCourses = TeamHasCourse::with('course')->where(['team_id' => $request->team_id, 'semester' => $request->semester ?? 1])->get();
        } else {
            $teamHasCourses = collect([]);
        }
        return view('teamHasCourses.index', [
            'teamHasCourses' => $teamHasCourses,
            'teams' => $teams,
            'courses' => $courses,
        ]);
    }

    /**
     * 说明: 我的课程
     *
     * @param $type
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function show($type, Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if ($type == 'my_course') {
            if (empty($team = TeamHasUser::where(['user_id' => $user->id])->first())) {
                $teamHasCourses = collect([]);
            } else {
                $teamHasCourses = TeamHasCourse::with('course')->where(['team_id' => $team->team_id, 'semester' => $request->semester ?? 1])->get();
            }
        } elseif ($type == 'my_team') {
            if (empty($courses = Course::where('teacher_id', $user->id)->pluck('id')->toArray())) {
                $teamHasCourses = collect([]);
            } else {
                $teamHasCourses = TeamHasCourse::with('course')->whereIn('course_id', $courses)->where(['semester' => $request->semester ?? 1])->get();
            }
        } else {
            $teamHasCourses = collect([]);
        }

        return view('teamHasCourses.show', [
            'teamHasCourses' => $teamHasCourses
        ]);
    }

    /**
     * 说明: 添加或者修改课程
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
     */
    public function store(Request $request)
    {
        $teamHasCourse = TeamHasCourse::where([
            'team_id' => $request->team_id,
            'day' => $request->day,
            'num' => $request->num,
        ])->first();
        if (empty($teamHasCourse)) {
            $create = TeamHasCourse::create([
                'team_id' => $request->team_id,
                'day' => $request->day,
                'num' => $request->num,
                'course_id' => $request->course_id,
                'semester' => $request->semester,
            ]);
            if (empty($create))
                return response()->json(['StatusCode' => 500, 'ResultData' => '设置失败，请联系管理员']);
            return response()->json(['StatusCode' => 200, 'ResultData' => '设置成功']);
        }

        $teamHasCourse->course_id = $request->course_id;
        $teamHasCourse->semester = $request->semester;
        $teamHasCourse->save();
        return response()->json(['StatusCode' => 200, 'ResultData' => '设置成功']);
    }

    /**
     * 说明: 删除课程
     *
     * @param TeamHasCourse $teamHasCourse
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 赵艺
     */
    public function destroy(TeamHasCourse $teamHasCourse)
    {
        if (empty($teamHasCourse->delete())) return response()->json(['StatusCode' => 404, 'ResultData' => '没有这条记录']);
        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功']);
    }
}
