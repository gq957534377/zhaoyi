<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * 说明: 资料修改页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function userInfo()
    {
        $user = Auth::user();
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
        if (empty($request->tel) || empty($request->email))
            return back()->withErrors('手机、邮箱均不能为空');

        $user->head_img = $request->head_img??'';
        $user->tel = $request->tel;
        $user->email = $request->email;
        if (empty($user->save()))
            return back()->withErrors('修改失败');
        return back()->withErrors('修改成功！', 'success');
    }

    /**
     * 说明: 修改密码视图
     *
     * @return mixed
     * @author 郭庆
     */
    public function changePwdView()
    {
        return view('users.changePwd');
    }

    /**
     * 说明: 修改密码
     *
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function changePwd(Request $request)
    {
        if (empty($request->password) || empty($request->oldPwd))
            return back()->withInput()->withErrors('旧密码不能为空');

        $user = Auth::user();
        if (!Auth::attempt(['no' => $user->no, 'password' => $request->oldPwd], false))
            return back()->withInput()->withErrors('旧密码错误');

        $user->password = bcrypt($request->password);
        if (empty($user->save()))
            return back()->withInput()->withErrors('修改密码失败');
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
