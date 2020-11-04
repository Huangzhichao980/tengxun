<?php
namespace panthsoni\tengxun\weixin\applet\lib;

use panthsoni\tengxun\common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'appid|小程序appid' => 'length:0,50',
        'secret|小程序密钥' => 'length:0,50',
        'js_code|登录时获取的 code'=>'length:0,50',
        'access_token|access_token' => 'length:0,255',
        'openid|用户openid'=>'length:0,50',
    ];

    public $scene = [
        'login' => ['appid'=>'require|length:0,50','secret'=>'require|length:0,50','js_code'=>'require|length:0,50'],
        'get_user_info' => ['access_token'=>'require|length:0,255','openid'=>'require|length:0,50'],
        'get_access_token' => ['appid'=>'require|length:0,50','secret'=>'require|length:0,50'],
        'get_daily_retain' => [],
        'get_monthly_retain' => [],
        'get_weekly_retain' => [],
        'get_daily_summary' => [],
    ];
}