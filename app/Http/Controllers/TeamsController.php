<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * 说明:  班级列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function index()
    {
        $teams = Team::paginate(10);
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * 说明: 添加班级视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * 说明: 添加班级操作
     *
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function store(Request $request)
    {
        if (empty(Team::create([
            'class' => $request->name,
            'stage' => $request->stage,
        ]))
        )
            return back()->withInput()->withErrors('添加失败！');
        return redirect('/teams')->withErrors('添加成功！', 'success');
    }

    /**
     * 说明: 修改班级视图
     *
     * @param Team $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function edit(Team $team)
    {
        return view('teams.edit', ['team' => $team]);
    }

    /**
     * 说明: 修改班级
     *
     * @param Team $team
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update(Team $team, Request $request)
    {
        $data = $request->except('_token', '_method');

        $team->class = $request->name;
        $team->stage= $request->stage;
        if (empty($team->save())) return back()->withErrors('修改失败!');

        return redirect('/teams')->withErrors('修改成功!', 'success');
    }

    /**
     * 说明: 删除班级
     *
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 赵艺
     */
    public function destroy(Team $team)
    {
        if (empty($team->delete())) return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败!']);

        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功!']);
    }
}
