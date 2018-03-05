<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeachersController extends Controller
{
    /**
     * 说明:  老师列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index()
    {
        $role = Role::where('name', 'teacher')->first();

        $teachers = $role->users??collect([]);
        return view('teachers.index', ['teachers' => $teachers]);
    }

    /**
     * 说明: 添加老师视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * 说明: 添加老师操作
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
            $user->assignRole('teacher');
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('添加老师失败：' . $e->getMessage() . $e->getLine() . $e->getFile());
            return back()->withInput()->withErrors('添加失败！');
        }
        return redirect('/teachers')->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 修改老师视图
     *
     * @param User $teacher
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(User $teacher)
    {
        return view('teachers.edit', ['teacher' => $teacher]);
    }

    /**
     * 说明: 修改老师
     *
     * @param User $teacher
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function update(User $teacher, Request $request)
    {
        $data = $request->except('_token', '_method');

        $result = User::where(['id' => $teacher->id])->update($data);

        if (empty($result)) return back()->withErrors('修改失败!');

        return redirect('/teachers')->withErrors('修改成功!', 'success');
    }

    /**
     * 说明: 删除老师
     *
     * @param User $teacher
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function destroy(User $teacher)
    {
        if (empty($teacher->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
