<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * 说明:  权限列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index()
    {
        $permissions = Permission::paginate(config('page.admin.permission'));
        return view('permissions.index', ['permissions' => $permissions]);
    }

    /**
     * 说明: 添加权限视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * 说明: 添加权限操作
     *
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['guard_name'] = 'web';
        $result = Permission::create($data);
        if (empty($result)) return back()->withInput()->withErrors('添加失败!');

        return redirect('/permissions')->withErrors('添加成功!', 'success');
    }

    /**
     * 说明: 修改权限视图
     *
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', ['permission' => $permission]);
    }

    /**
     * 说明: 修改权限
     *
     * @param Permission $permission
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function update(Permission $permission, Request $request)
    {
        $data = $request->except('_token', '_method');

        $result = Permission::where(['id' => $permission->id])->update($data);

        if (empty($result)) return back()->withErrors('修改失败!');

        return redirect('/permissions')->withErrors('修改成功!','success');
    }

    /**
     * 说明: 删除权限
     *
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function destroy(Permission $permission)
    {
        if (empty($permission->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
