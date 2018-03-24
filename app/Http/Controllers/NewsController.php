<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class NewsController extends Controller
{
    /**
     * 说明: 消息管理列表
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!empty($request->type) || $request->type == 'send') {
            $news = News::where('send_id', $user->id)->paginate(10);
        } else {
            $news = News::where('receive_id', $user->id)->paginate(10);
        }
        return view('news.index', ['news' => $news]);
    }

    /**
     * 说明: 消息发送
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $role = $user->roles->first()->name;
        if ($role == 'dean') {
            $users = Role::whereIn('name', ['student', 'teacher'])->get()->map(function ($role) {
                return $role->users;
            })->collapse();
        } elseif ($role == 'teacher') {
            $users = Role::where('name', 'student')->first()->users;
        } else {
            $users = collect([]);
        }
        return view('news.create', ['users' => $users]);
    }

    /**
     * 说明: 设置为已读
     *
     * @param News $news
     * @author 郭庆
     */
    public function edit(News $news)
    {
        $news->status = 2;
        $news->save();
    }

    /**
     * 说明: 发送消息
     *
     * @param Request $request
     * @return $this
     * @author 郭庆
     */
    public function store(Request $request)
    {
        if (empty(News::create([
            'send_id' => Auth::user()->id,
            'receive_id' => $request->receive_id,
            'content' => $request->get('content'),
        ])))
            return back()->withErrors('发送失败');
        return redirect('/news')->withErrors('发送成功', 'success');
    }

    /**
     * 说明: 删除消息
     *
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 郭庆
     */
    public function destroy(News $news)
    {
        if (empty($news->delete()))
            return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败']);
        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功']);
    }
}
