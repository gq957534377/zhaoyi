<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DeansController extends Controller
{
    /**
     * 说明:  教务列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function index()
    {
        $role = Role::where('name', 'dean')->first();

        $deans = $role->users??collect([]);
        return view('deans.index', ['deans' => $deans]);
    }

    /**
     * 说明: 添加教务视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function create()
    {
        return view('deans.create');
    }

    /**
     * 说明: 添加教务操作
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

            // 将该用户绑定为公司角色
            $user->assignRole('dean');
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('添加教务失败：' . $e->getMessage() . $e->getLine() . $e->getFile());
            return back()->withInput()->withErrors('添加失败！');
        }
        return redirect('/deans')->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 修改教务视图
     *
     * @param User $dean
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function edit(User $dean)
    {
        return view('deans.edit', ['dean' => $dean]);
    }

    /**
     * 说明: 修改教务
     *
     * @param User $dean
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update(User $dean, Request $request)
    {
        $data = $request->except('_token', '_method');

        $result = User::where(['id' => $dean->id])->update($data);

        if (empty($result)) return back()->withErrors('修改失败!');

        return redirect('/deans')->withErrors('修改成功!', 'success');
    }

    /**
     * 说明: 删除教务
     *
     * @param User $dean
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
     */
    public function destroy(User $dean)
    {
        if (empty($dean->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
