<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminLoginController extends BaseController
{
//    use Tool;
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

    public function login(Request $request)
    {
        // 验证码
        $captcha = $request->get('captcha',"");
        if (strtolower(session('CAPTCHA_IMG')) !== strtolower($captcha)) {
            return $this->errorWithMsg('验证码输入错误', 402);
        }
        // 1. 获取前端发来的用户名和密码
        $username = $request->input('name');
        $password = $request->input('password');

        // 2. 尝试使用用户名和密码进行登录
        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            // 3. 登录成功后，进行令牌发送
            $user = Auth::user();
//            event(new UserLogin($user));
//            DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(['revoked' => 1]);

            $token = Str::random(80);
            $expire = 1800; //token存续时间
            return $this->successWithResult([
                'adminId' => $user->id,
                'expire' => $expire,
                'expireTime' => date("Y-m-d H:i:s", time() + $expire),
                'token' => $token,
                'updateTime' => date("Y-m-d H:i:s", time()),
            ]);
            return $this->proxy($username, $password);
        } else {
            //4. 不成功，则提示用户名或者密码出错
            return $this->errorWithMsg('用户名或密码错误', 1023);
        }
    }

    public function logout()
    {
        Auth::logout();
        return $this->successWithMsg('退出成功');

//        1. 获取现在登录的用户信息
        $user = Auth::guard('api')->user();
        event(new UserLogout($user));
        $accessToken = $user->token();
//        2. 让刷新令牌失效
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true,
            ]);
        cookie()->forget('refresh_token');
//        3. 让活动令牌失效
        $accessToken->revoke();


    }

    public function refresh(Request $request)
    {
        $refreshToken = $request->cookie('refreshToken');
        $data = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'scope' => '',
        ];
        return $this->token($data);

    }

    protected function proxy($username, $password)
    {
        $data = [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'username' => $username,
            'password' => $password,
            'scope' => '',
        ];

        return $this->token($data);

    }

    protected function token($data = [])
    {
        $token = Str::random(80);
        $api_token = hash('sha256', $token);
        $token = hash('sha256', $data['api_token']);
        return $this->successWithResult([
            'adminId' => 1,
            'expire' => 43200000,
            'expireTime' => "2020-02-22 11:27:56",
            'token' => $token,
            'updateTime' => "2020-02-21 23:27:56",
        ])->cookie('refreshToken', $token, 43200);
    }

}
