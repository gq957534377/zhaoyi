<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * 说明: 返回角色列表页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
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
     * @author 赵艺
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * 说明: 添加角色以及权限
     *
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        \DB::beginTransaction();
        try {
            $role = Role::create([
                'guard_name' => 'web',
                'name' => $data['name'],
                'name_cn' => $data['name_cn']
            ]);
            $role->givePermissionTo($data['permissions']??[]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('添加' . $data['name_cn'] . '角色失败' . $e->getMessage());
            return back()->withInput()->withErrors('添加失败,错误信息：' . $e->getMessage());
        }
        return redirect('/roles')->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 角色修改
     *
     * @param Role $role
     * @return mixed
     * @author 赵艺
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', [
            'permissions' => $permissions,
            'role' => $role,
            'rolePermissions' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * 说明: 修改角色权限
     *
     * @param Role $role
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update(Role $role, Request $request)
    {
        \DB::beginTransaction();
        try {
            $role->name = $request->name;
            $role->name_cn = $request->name_cn;
            $role->save();

            $role->syncPermissions($request->permissions??[]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('修改' . $role->name_cn . '角色失败' . $e->getMessage() . $e->getFile() . $e->getCode());
            return back()->withInput()->withErrors('修改失败,错误信息：' . $e->getMessage());
        }
        return redirect('/roles')->withErrors('修改成功！', 'success');
    }

    /**
     * 说明: 删除角色
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
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
