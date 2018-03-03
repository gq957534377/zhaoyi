<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * 说明: 返回角色列表页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'administrator')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * 说明: 添加角色页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        $user = Auth::user();
        $permissions = $user->getAllPermissions();

        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * 说明: 添加角色以及权限
     *
     * @param RoleStore $request
     * @param AgentService $agentService
     * @return mixed
     * @author 郭庆
     */
    public function store(RoleStore $request, AgentService $agentService)
    {
        $data = $request->except('_token');
        $company_guid = $agentService->getCompanyGuid();
        \DB::beginTransaction();
        try {
            $role = Role::create([
                'guard_name' => 'company',
                'company_guid' => $company_guid,
                'name' => RolePermission::setRoleName($data['role_en']),
                'name_en' => $data['role_en'],
                'name_cn' => $data['role_cn']
            ]);
            $role->givePermissionTo($data['permission']);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('添加' . $data['role_cn'] . '角色失败' . $e->getMessage());
            return back()->withInput()->withErrors('添加失败,错误信息：' . $e->getMessage());
        }
        return back()->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 角色修改
     *
     * @param Role $role
     * @return mixed
     * @author 郭庆
     */
    public function edit(Role $role)
    {
        // 获取当前登录用户的权限
        $user = \Auth::guard('company')->user();
        $result = $user->getAllPermissions();
        $permissions = \App\Model\Permission::getCompanyPermissions($result);

        return view('agent.roles.edit', [
            'permissions' => $permissions,
            'role' => $role,
            'rolePermissions' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * 说明: 修改角色权限
     *
     * @param Role $role
     * @param UpdateRole $request
     * @return mixed
     * @author 郭庆
     */
    public function update(Role $role, UpdateRole $request)
    {
        \DB::beginTransaction();
        try {
            $role->name = RolePermission::setRoleName($request->role_en);
            $role->name_cn = $request->role_cn;
            $role->name_en = $request->role_en;
            $role->save();

            $role->syncPermissions($request->permission);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('修改' . $role->name . '角色失败' . $e->getMessage());
            return back()->withInput()->withErrors('修改失败,错误信息：' . $e->getMessage());
        }
        return back()->withErrors('修改成功！', 'success');
    }

    /**
     * 说明: 删除角色
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function destroy(Role $role)
    {
        if (!empty($role->users->count()))
            return response()->json(['StatusCode' => 400, 'ResultData' => '该角色下尚有用户存在，不可删除']);

        \DB::beginTransaction();
        try {
            $role->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('删除' . $role->name . '角色失败' . $e->getMessage());
            return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败']);
        }

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功']);
    }
}
