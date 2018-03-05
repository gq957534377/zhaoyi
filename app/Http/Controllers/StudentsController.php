<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StudentsController extends Controller
{
    /**
     * 说明:  学生列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index()
    {
        $role = Role::where('name', 'student')->first();

        $students = $role->users??collect([]);
        return view('students.index', ['students' => $students]);
    }

    /**
     * 说明: 添加学生视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * 说明: 添加学生操作
     *
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function store(Request $request)
    {
        // 事务处理同时插入登录表和公司表
        \DB::beginTransaction();
        try {
            // 登录表
            $user = User::create([
                'name' => $request->name,
                'no' => $request->no,
                'password' => bcrypt($request->password),
                'status' => 1,
            ]);

            // 将该用户绑定为公司角色
            $user->assignRole('student');
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('添加学生失败：' . $e->getMessage() . $e->getLine() . $e->getFile());
            return back()->withInput()->withErrors('添加失败！');
        }
        return redirect('/students')->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 修改学生视图
     *
     * @param User $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(User $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * 说明: 修改学生
     *
     * @param User $student
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function update(User $student, Request $request)
    {
        $data = $request->except('_token', '_method');

        $result = User::where(['id' => $student->id])->update($data);

        if (empty($result)) return back()->withErrors('修改失败!');

        return redirect('/students')->withErrors('修改成功!', 'success');
    }

    /**
     * 说明: 删除学生
     *
     * @param User $student
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function destroy(User $student)
    {
        if (empty($student->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
