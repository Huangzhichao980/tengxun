<?php
namespace panthsoni\tengxun\weixin\platform\lib;

use panthsoni\tengxun\common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'timestamp|微信时间戳timestamp'=>'length:0,255',
        'nonce|微信随机数nonce'=>'length:0,255',
        'encrypt_type|微信加密类型encrypt_type'=>'length:0,20',
        'msg_signature|微信消息签名体msg_signature'=>'length:0,255',
        'signature|签名signature'=>'length:0,255',
        'token|开放平台设置的token'=>'length:0,255',
        'encoding_aes_key|加密encoding_aes_key'=>'length:0,255',
        'component_appid|开放平台component_appid'=>'length:0,20',
        'component_appsecret|第三方平台component_appsecret'=>'length:0,100',
        'component_verify_ticket|微信后台推送的component_verify_ticket'=>'length:0,100',
        'component_access_token|第三方component_access_token'=>'length:0,255',
        'pre_auth_code|预授权pre_auth_code'=>'length:0,255',
        'redirect_uri|授权回调地址redirect_uri'=>'length:0,255',
        'auth_type|授权类型auth_type'=>'in:1,2,3',
        'authorization_code|授权码authorization_code'=>'length:0,255',
        'authorizer_appid|授权公众号authorizer_appid'=>'length:0,20',
        'authorizer_refresh_token|刷新authorizer_refresh_token'=>'length:0,255',
        'option_name|选项名称option_name'=>'length:0,50',
        'option_value|选项值option_value'=>'length:0,50',
        'offset|起始位置offset'=>'number',
        'count|拉取数量count'=>'number',
        'access_token|access_token' => 'length:0,255',
        'appid|公众号appid' => 'length:0,50',
        'scope|授权作用域scope' => 'in:snsapi_base,snsapi_userinfo',
        'state|state参数'=>'length:0,128',
        'code|参数code'=>'length:0,128',
        'openid|openid'=>'length:0,50',
        'expire_seconds|过期时间expire_seconds'=>'number',
        'action_name|二维码类型action_name'=>'in:QR_SCENE,QR_STR_SCENE,QR_LIMIT_SCENE,QR_LIMIT_STR_SCENE',
        'action_info|二维码详细信息action_info'=>'array'
    ];

    public $scene = [
        'listen' => [
            'timestamp'=>'require|length:0,255',
            'nonce'=>'require|length:0,255',
            'encrypt_type'=>'require|length:0,20',
            'msg_signature'=>'require|length:0,255',
            'signature'=>'require|length:0,255',
            'token'=>'require|length:0,255',
            'encoding_aes_key'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
        ],
        'get_component_token' => [
            'component_appid'=>'require|length:0,20',
            'component_appsecret'=>'require|length:0,100',
            'component_verify_ticket'=>'require|length:0,100',
        ],
        'get_preauthcode' => [
            'component_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
        ],
        'get_auth_pc_url' => [
            'component_appid'=>'require|length:0,20',
            'pre_auth_code'=>'require|length:0,255',
            'redirect_uri'=>'require|length:0,255',
            'auth_type'=>'require|in:1,2,3',
        ],
        'get_auth_mobile_url' => [
            'component_appid'=>'require|length:0,20',
            'pre_auth_code'=>'require|length:0,255',
            'redirect_uri'=>'require|length:0,255',
            'auth_type'=>'require|in:1,2,3',
        ],
        'get_query_auth' => [
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'authorization_code'=>'require|length:0,255',
        ],
        'refresh_authorizer_token' => [
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'authorizer_appid'=>'require|length:0,20',
            'authorizer_refresh_token'=>'require|length:0,255',
        ],
        'get_authorizer_info' => [
            'authorizer_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
        ],
        'get_authorizer_option' => [
            'authorizer_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'option_name'=>'require|length:0,50',
        ],
        'set_authorizer_option' => [
            'authorizer_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'option_name'=>'require|length:0,50',
            'option_value'=>'require|length:0,50',
        ],
        'get_authorizer_list' => [
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'offset'=>'require|number',
            'count'=>'require|number',
        ],
        'create_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],

        'bind_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],

        'unbind_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],

        'get_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],

        'qrcode_create'=>[
            'access_token'=>'require|length:0,255',
            'expire_seconds'=>'require|number',
            'action_name'=>'require|in:QR_SCENE,QR_STR_SCENE,QR_LIMIT_SCENE,QR_LIMIT_STR_SCENE',
            'action_info'=>'require|array'
        ],

        /*监听公众号*/
        'listenAccount' => [
            'component_appid'=>'require|length:0,20',
            'token'=>'require|length:0,255',
            'encoding_aes_key'=>'require|length:0,255',
            'timestamp'=>'require|length:0,255',
            'nonce'=>'require|length:0,255',
            'encrypt_type'=>'require|length:0,20',
            'msg_signature'=>'require|length:0,255',
            'signature'=>'require|length:0,255',
        ],

        /*回复用户消息*/
        'replyMessage' => [
            'msg_type'=>'require|in:text,voice,video,music,news,image',
            'to_user_name'=>'require|length:0,50',
            'from_user_name'=>'require|length:0,50',
            'token'=>'require|length:0,255',
            'encoding_aes_key'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
        ],
        'text'=>['content'=>'require|length:0,255'],
        'voice'=>['media_id'=>'require|length:0,50'],
        'video'=>['media_id'=>'require|length:0,50','title'=>'require|length:0,50','description'=>'require|length:0,255'],
        'music'=>['media_id'=>'require|length:0,50','title','description','music_url','hq_music_url'],
        'image'=>['media_id'=>'require|length:0,50'],
        'news'=>['article_counts'=>'require|between:1,8','article_content'=>'require|array'],
        'news_item'=>['title'=>'require|length:0,50','description'=>'require|length:0,50','pic_url'=>'require|length:0,255','url'=>'require|length:0,255',],

        'account_web_auth' => [
            'component_appid'=>'require|length:0,20',
            'appid'=>'require|length:0,20',
            'scope'=>'require|in:snsapi_base,snsapi_userinfo',
            'state'=>'require|length:0,128',
            'redirect_uri'=>'require|length:0,255',
        ],

        'get_web_auth_access_token' => [
            'component_appid'=>'require|length:0,20',
            'appid'=>'require|length:0,20',
            'code'=>'require|length:0,100',
            'component_access_token'=>'require|length:0,255',
        ],

        'get_user_info' => [
            'access_token' => 'require|length:0,255',
            'openid' => 'require|length:0,50',
        ],

        'get_user_base_info' => [
            'access_token' => 'require|length:0,255',
            'openid' => 'require|length:0,50',
        ],

        'send_template' => [
            'template_msg' => 'require|length:0,255'
        ]
    ];
}