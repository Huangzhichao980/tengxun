<?php
namespace tencent\wechat\open\website\lib;

use common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'appid|公众号appid' => 'length:0,50',
        'secret|公众号密钥' => 'length:0,50',
        'code|授权code'=>'length:0,50',
        'refresh_token|刷新token' => 'length:0,100',
        'openid|用户openid' => 'length:0,32',
        'access_token|access_token' => 'length:0,100',
        'touser|发送用户openid' => 'length:0,32',
        'template_id|模板id' => 'length:0,50',
        'url|跳转链接' => 'length:0,255',
        'scene|订阅场景值' => 'length:0,50',
        'title|标题' => 'length:0,50',
        'data|数据' => 'length:0,255',
        'redirect_uri|回调地址' => 'length:0,255',
        'state|state' => 'length:0,128',
    ];

    public $scene = [
        'get_access_token' => ['appid'=>'require|length:0,50','secret'=>'require|length:0,50','code'=>'require|length:0,50'],
        'refresh_access_token' => ['appid'=>'require|length:0,50','refresh_token'=>'require|length:0,100'],
        'check_access_token' => ['access_token'=>'require|length:0,100','openid'=>'require|length:0,32'],
        'get_user_info' => ['access_token'=>'require|length:0,100','openid'=>'require|length:0,32'],
        'login' => ['appid'=>'require|length:0,50','redirect_uri'=>'require|length:0,255','state'=>'require|length:0,128'],
    ];
}