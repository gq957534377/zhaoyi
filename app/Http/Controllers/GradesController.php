<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * 说明:  返回当前登录用户的成绩表
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index(Request $request)
    {

        return view('grades.index', ['grades' => $grades]);
    }

    /**
     * 说明: 添加成绩视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
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
     * @author 郭庆
     */
    public function store(Request $request)
    {

    }

    /**
     * 说明: 修改成绩视图
     *
     * @param User $dean
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
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
     * @author 郭庆
     */
    public function update()
    {

    }

    /**
     * 说明: 删除成绩
     *
     * @param User $dean
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function destroy()
    {

    }
}
