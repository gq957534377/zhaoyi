<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamHasUser;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StudentsController extends Controller
{
    /**
     * 说明:  学生列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
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
     * @author 赵艺
     */
    public function create()
    {
        $teams = Team::all();
        return view('students.create', ['teams' => $teams]);
    }

    /**
     * 说明: 添加学生操作
     *
     * @param Request $request
     * @return mixed
     * @author 赵艺
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

            // 将该用户绑定为学生角色
            $user->assignRole('student');

            // 添加班级关联表
            TeamHasUser::insert([
                'team_id' => $request->team_id,
                'user_id' => $user->id,
            ]);
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
     * @author 赵艺
     */
    public function edit(User $student)
    {
        $teams = Team::all();
        return view('students.edit', ['student' => $student, 'teams' => $teams]);
    }

    /**
     * 说明: 修改学生
     *
     * @param User $student
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update(User $student, Request $request)
    {
        $data = $request->except('_token', '_method');
        if ($student->team_id != $data['team_id']) {
            \DB::table('team_has_users')->where(['user_id' => $student->id])->update(['team_id'=>$data['team_id']]);
            unset($data['team_id']);
        }
        $result = User::where(['id' => $student->id])->update($data);

        if (empty($result)) return back()->withErrors('修改失败!');

        return redirect('/students')->withErrors('修改成功!', 'success');
    }

    /**
     * 说明: 删除学生
     *
     * @param User $student
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
     */
    public function destroy(User $student)
    {
        if (empty($student->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
