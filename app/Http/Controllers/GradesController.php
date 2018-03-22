<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Team;
use App\Models\TeamHasCourse;
use App\Models\TeamHasUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class GradesController extends Controller
{
    /**
     * 说明: 返回当前老师的代课列表信息
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $courses = Course::where('teacher_id', $user->id)->get();

        if (empty($request->course_id))
            return view('grades.index', ['StatusCode' => 400, 'ResultData' => '请选择所带课程', 'courses' => $courses, 'teams' => collect([])]);
        $teamHasCourses = TeamHasCourse::where(['course_id' => $request->course_id, 'semester' => $request->semester ?? 1])
            ->pluck('team_id')
            ->toArray();
        $teams = Team::find($teamHasCourses);

        if (empty($request->team_id))
            return view('grades.index', ['StatusCode' => 400, 'ResultData' => '请选择所属班级', 'courses' => $courses, 'teams' => $teams]);

        $role = Role::where('name', 'student')->first();
        $studentIds = $role->users->pluck('id')->toArray();
        $studentIds = TeamHasUser::where(['team_id' => $request->team_id])
            ->whereIn('user_id', $studentIds)
            ->pluck('user_id')
            ->toArray();

        $students = User::find($studentIds);
        if (empty($students->count()))
            return view('grades.index', ['StatusCode' => 204, 'ResultData' => '该班级下暂无学生', 'courses' => $courses, 'teams' => $teams]);
        return view('grades.index', ['StatusCode' => 200, 'ResultData' => $students, 'courses' => $courses, 'teams' => $teams]);
    }

    /**
     * 说明: 添加成绩视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function create()
    {
        return view('grades.create');
    }

    public function show()
    {
        $where['semester'] = $request->semester ?? null;
        $grades = Grade::where(array_filter($where))->get();

        return view('grades.index', ['grades' => $grades]);
    }

    /**
     * 说明: 添加成绩操作
     *
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function store(Request $request)
    {

    }

    /**
     * 说明: 修改成绩视图
     *
     * @param User $dean
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function edit()
    {

    }

    /**
     * 说明: 修改成绩
     *
     * @param User $dean
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update()
    {

    }

    /**
     * 说明: 删除成绩
     *
     * @param User $dean
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
     */
    public function destroy()
    {

    }
}
