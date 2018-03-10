<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Qiniu\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 返回七牛存储Token,用于多图上传
     *
     * @return \Illuminate\Http\JsonResponse
     * @author
     */
    public function getToken()
    {
        $accessKey = 'Z6fxJAffaB5yK9VpW_85SUWVBosEr_yXSCsODjmm';
        $secretKey = 'VKyfWX4e7TdHwXbkss6m9gwE9-uGMfsjSvYGUvqS';
        $bucket = 'guoqing2';
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        $result = ['uptoken' => $token];
        return response()->json($result);
    }
}
