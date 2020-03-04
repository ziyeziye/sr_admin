<?php

namespace App\Http\Controllers;

use App\Services\UploadsManager;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Http\Request;

class CommonController extends BaseController
{
    /**
     * 输出验证码
     * @param Request $request
     */
    public function getCaptcha(Request $request)
    {
        $phrase = new PhraseBuilder();
        // 设置验证码位数
        $code = $phrase->build(4, '1234567890');
        // 生成验证码图片的Builder对象,配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色25,25,112
        $builder->setBackgroundColor(25, 25, 112);
        // 设置倾斜角度
        $builder->setMaxAngle(25);
        // 设置验证码后面最大行数
        $builder->setMaxBehindLines(10);
        // 设置验证码前面最大行数
        $builder->setMaxFrontLines(10);
        // 设置验证码颜色
        $builder->setTextColor(255, 255, 0);
        // 可以设置图片宽高及字体
        $builder->build($width = 120, $height = 30, $font = null);

        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session()->put('CAPTCHA_IMG', $phrase);

        // 生成图片
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type:image/jpeg');
        $builder->output();
    }

    public function upload(Request $request, UploadsManager $manager)
    {
        $file = $request->file('file');
        $path = $manager->uploadImg($file);

        if ($path) {
            return $this->successWithResult(["path" => $path, "src" => env('APP_URL') . $path]);
        } else {
            return $this->errorWithMsg("上传失败");
        }
    }

}
