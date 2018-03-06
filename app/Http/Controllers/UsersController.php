<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * 说明: 用户资料页面
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * 说明: 资料修改页面
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * 说明: 修改资料
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function updateInfo(User $user, Request $request)
    {
        if (empty($request->head_img) || empty($request->name))
            return back()->withErrors('头像或者姓名不能为空');

        $user->head_img = $request->head_img;
        $user->name = $request->name;
        if (empty($user->save()))
            return back()->withErrors('修改失败');
        return back()->withErrors('修改成功！', 'success');
    }

    /**
     * 说明: 绑定邮箱
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function bindEmail(User $user, Request $request)
    {
        if (empty($request->email))
            return back()->withErrors('邮箱不能为空');

        $user->email = $request->email;
        if (empty($user->save()))
            return back()->withErrors('绑定邮箱失败');
        return back()->withErrors('绑定邮箱成功！', 'success');
    }

    /**
     * 说明: 绑定手机
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function bindTel(User $user, Request $request)
    {
        if (empty($request->tel))
            return back()->withErrors('手机不能为空');

        $user->tel = $request->tel;
        if (empty($user->save()))
            return back()->withErrors('绑定手机失败');
        return back()->withErrors('绑定手机成功！', 'success');
    }

    /**
     * 说明: 修改密码
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function changePwd(User $user, Request $request)
    {
        if (empty($request->password))
            return back()->withErrors('密码不能为空');

        $user->password = bcrypt($request->password);
        if (empty($user->save()))
            return back()->withErrors('修改密码失败');
        return back()->withErrors('修改密码成功！', 'success');
    }

    /**
     * 说明: 绑定微信
     *
     * @param Request $request
     * @return $this
     * @author 郭庆
     */
    public function bindWechat(Request $request)
    {
        if (empty($back = $request->get('back')) || empty($request->get('code')) || empty($request->get('state')) || empty($user = $this->guard()->user()))
            return redirect($back)->withErrors('请登录后在微信中操作');
        $weChatUser = self::$application->oauth->user();
        $result['weChat'] = $weChatUser->getOriginal()['openid'];
        $result['weChat_name'] = $weChatUser->getOriginal()['nickname'];
        $result['weChat_head'] = $weChatUser->getOriginal()['headimgurl'];
        // 将获取到的用户微信信息存入用户表
        switch ($user->role) {
            case config('role.company'):
                $userInfo = Company::where('guid', $user->guid);
                break;
            case config('role.company_admin'):
            case config('role.company_agent'):
                $userInfo = Agent::where('guid', $user->guid);
                break;
            case config('role.user'):
                $userInfo = User::where('guid', $user->guid);
                break;
            default:
                return redirect($back)->withErrors('当前登录用户角色异常');
        }
        if (empty($userInfo->update($result)))
            return redirect($back)->withErrors('服务端异常，请稍后重试');
        return redirect($back)->withErrors('绑定成功', 'success');
    }

}
