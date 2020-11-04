<?php
namespace panthsoni\tengxun\weixin\corporation\lib;

use panthsoni\tengxun\common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'timestamp|时间戳'=>'length:0,100',
        'nonce|随机数'=>'length:0,100',
        'echostr|随机字符串'=>'length:0,100',
        'token|token码'=>'length:0,100',
        'encoding_aes_key|随机秘钥'=>'length:0,100',
        'msg_signature|消息签名'=>'length:0,100',
        'appid|企业微信id'=>'length:0,50',
        'corpid|企业微信id'=>'length:0,50',
        'corpsecret|企业微信secret'=>'length:0,50',
        'token|加密token'=>'length:0,50',
        'msg_type|消息类型'=>'in:text,voice,video,music,news,image,transfer_customer_service',
        'to_user_name|接收用户openid'=>'length:0,50',
        'from_user_name|发送者'=>'length:0,50',
        'content|内容'=>'length:0,255',
        'media_id|媒体id'=>'length:0,50',
        'title|标题'=>'length:0,50',
        'description|描述'=>'length:0,255',
        'music_url|音乐链接'=>'length:0,255',
        'hq_music_url|hq音乐链接'=>'length:0,255',
        'article_counts|文章个数'=>'between:1,8',
        'pic_url|图片链接'=>'length:0,255',
        'url|跳转链接'=>'length:0,255',
        'article_content|文章内容'=>'array',
        'expire_seconds|过期时间'=>'number',
        'action_name|二维码类型'=>'in:QR_SCENE,QR_STR_SCENE',
        'action_info|二维码详细信息'=>'array',
        'access_token|access_token'=>'length:0,255',
        'id|部门ID'=>'number',
        'name|部门名称'=>'length:0,32',
        'name_en|部门名称'=>'length:0,32',
        'parentid|父级部门id'=>'number',
        'order|排序'=>'number',
    ];

    public $scene = [
        /*监听*/
        'listen'=>[
            'msg_signature'=>'require|length:0,100',
            'timestamp'=>'require|length:0,100',
            'nonce'=>'require|length:0,100',
            'appid'=>'require|length:0,50',
            'token'=>'require|length:0,50',
            'encoding_aes_key'=>'require|length:0,128',
            'echostr',
        ],
        'replyMessage'=>[
            'msg_type'=>'require|in:text,voice,video,music,news,image,transfer_customer_service',
            'to_user_name'=>'require|length:0,50',
            'from_user_name'=>'require|length:0,50',
            'token','appid','encoding_aes_key'
        ],
        'text'=>['content'=>'require|length:0,255'],
        'voice'=>['media_id'=>'require|length:0,50'],
        'video'=>['media_id'=>'require|length:0,50','title'=>'require|length:0,50','description'=>'require|length:0,255'],
        'music'=>['media_id'=>'require|length:0,50','title','description','music_url','hq_music_url'],
        'image'=>['media_id'=>'require|length:0,50'],
        'news'=>['article_counts'=>'require|between:1,8','article_content'=>'require|array'],
        'news_item'=>['title'=>'require|length:0,50','description'=>'require|length:0,50','pic_url'=>'require|length:0,255','url'=>'require|length:0,255',],
        'transfer_customer_service'=>['kf_account'],
        'access_token'=>[
            'corpid'=>'require|length:0,50',
            'corpsecret'=>'require|length:0,50'
        ],
        'get_api_domain_ip'=>[
            'access_token' => 'require|length:0,255'
        ],
        'member_create'=>[

        ],
        'member_get'=>[

        ],
        'member_update'=>[

        ],
        'member_delete'=>[

        ],
        'member_batch_delete'=>[

        ],
        'department_member_get'=>[

        ],
        'department_member_detail'=>[

        ],
        'convert_to_openid'=>[

        ],
        'authsucc'=>[

        ],
        'invite'=>[

        ],
        'get_join_qrcode'=>[

        ],
        'get_active_stat'=>[

        ],
        'department_create'=>[
            'access_token' => 'require|length:0,255',
            'parentid' => 'require|number',
            'name' => 'require|length:0,32',
            'name_en','parentid','order'
        ],
        'department_update'=>[
            'access_token' => 'require|length:0,255',
            'id' => 'require|number',
            'name','name_en','parentid','order'
        ],
        'department_delete'=>[
            'access_token' => 'require|length:0,255',
            'id' => 'require|number',
        ],
        'department_list'=>[
            'access_token' => 'require|length:0,255',
            'id'
        ]
    ];
}