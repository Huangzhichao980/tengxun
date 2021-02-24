<?php
namespace panthsoni\tengxun\weixin\applet\lib;

use panthsoni\tengxun\common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'appid|小程序appid' => 'length:0,50',
        'secret|小程序密钥secret' => 'length:0,50',
        'js_code|登录时获取的js_code'=>'length:0,50',
        'access_token|access_token' => 'length:0,255',
        'openid|用户openid'=>'length:0,50',
        'begin_date|开始日期begin_date'=>'dateFormat:Ymd',
        'end_date|结束日期begin_date'=>'dateFormat:Ymd',
        'touser|用户touser，即openid'=>'length:255',
        'msgtype|消息类型'=>'in:text,image,link,miniprogrampage',
        'text|文本消息text，msgtype=text时必填'=>'array',
        'image|图片消息image，msgtype=image时必填'=>'array',
        'link|图文链接link，msgtype=link时必填'=>'array',
        'miniprogrampage|小程序卡片miniprogrampage，msgtype=miniprogrampage时必填'=>'array',
        'command|命令command'=>'in:Typing,CancelTyping',
        'type|文件类型type'=>'in:image',
        'mp_template_msg|公众号模板消息相关的信息mp_template_msg'=>'array',
    ];

    public $scene = [
        'applet_login' => [
            'appid'=>'require|length:0,50',
            'secret'=>'require|length:0,50',
            'js_code'=>'require|length:0,50'
        ],
        'applet_get_user_info' => [
            'access_token'=>'require|length:0,255',
            'openid'=>'require|length:0,50'
        ],
        'get_access_token' => [
            'appid'=>'require|length:0,50',
            'secret'=>'require|length:0,50'
        ],
        'get_daily_retain' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_monthly_retain' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_weekly_retain' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_daily_summary' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_daily_visit_trend' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_weekly_visit_trend' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_monthly_visit_trend' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_user_portrait' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_visit_distribution' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_visit_page' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'get_temp_media' => [
            'access_token'=>'require|length:0,255',
            'media_id'=>'require|length:255',
        ],
        'send' => [
            'access_token'=>'require|length:0,255',
            'touser'=>'require|length:255',
            'msgtype'=>'require|in:text,image,link,miniprogrampage',
            'text','image','link','miniprogrampage'
        ],
        'set_typing' => [
            'access_token'=>'require|length:0,255',
            'touser'=>'require|length:255',
            'command'=>'require|in:Typing,CancelTyping',
        ],
        'upload_temp_media' => [
            'access_token'=>'require|length:0,255',
            'media_id'=>'require|length:255',
            'type'=>'require|in:image'
        ],
        'uniform_send' => [
            'access_token'=>'require|length:0,255',
            'touser'=>'require|length:255',
            'mp_template_msg'=>'require|array',
        ]
    ];
}