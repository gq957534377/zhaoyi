<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CoursesController extends Controller
{
    /**
     * 说明:  课程列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function index()
    {
        $courses = Course::with('teacher')->paginate(10);
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * 说明: 添加课程视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function create()
    {
        $role = Role::where('name', 'teacher')->first();

        $teachers = $role->users??collect([]);
        return view('courses.create', ['teachers' => $teachers]);
    }

    /**
     * 说明: 添加课程操作
     *
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function store(Request $request)
    {
        if (empty(Course::create([
            'name' => $request->name,
            'max_num' => $request->max_num,
            'time' => $request->time,
            'classroom' => $request->classroom,
            'credit' => $request->credit,
            'teacher_id' => $request->teacher_id,
        ]))
        )
            return back()->withInput()->withErrors('添加失败！');
        return redirect('/courses')->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 修改课程视图
     *
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function edit(Course $course)
    {
        $role = Role::where('name', 'teacher')->first();

        $teachers = $role->users??collect([]);
        return view('courses.edit', ['course' => $course, 'teachers' => $teachers]);
    }

    /**
     * 说明: 修改课程
     *
     * @param Course $course
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update(Course $course, Request $request)
    {
        $data = $request->except('_token', '_method');

        $result = Course::where(['id' => $course->id])->update($data);

        if (empty($result)) return back()->withErrors('修改失败!');

        return redirect('/courses')->withErrors('修改成功!', 'success');
    }

    /**
     * 说明: 删除课程
     *
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
     */
    public function destroy(Course $course)
    {
        if (empty($course->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
