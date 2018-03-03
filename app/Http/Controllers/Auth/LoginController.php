<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 设置使用用户名登陆.
     *
     * @return string
     */
    public function username()
    {
        return 'no';
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->status != 1) {
            $this->guard()->logout();
            return redirect('/login')->withInput()->withErrors(['no'=>'账号禁用']);
        }

        // 更新上次登陆ip和登陆时间
        $request->session()->put('login_last_time', $user->updated_at);
        $request->session()->put('login_last_ip', $user->ip);
        $user->ip = $request->getClientIp();
        $user->updated_at = time();
        $user->save();
    }
}
