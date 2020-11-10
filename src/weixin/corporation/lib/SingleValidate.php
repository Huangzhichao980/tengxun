<?php
namespace panthsoni\tengxun\weixin\corporation\lib;

use panthsoni\tengxun\common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'timestamp|时间戳timestamp'=>'length:0,100',
        'nonce|随机数nonce'=>'length:0,100',
        'echostr|随机字符串echostr'=>'length:0,100',
        'token|token码'=>'length:0,100',
        'encoding_aes_key|随机秘钥encoding_aes_key'=>'length:0,100',
        'msg_signature|消息签名msg_signature'=>'length:0,100',
        'appid|企业微信appid'=>'length:0,50',
        'corpid|企业微信corpid'=>'length:0,50',
        'corpsecret|企业微信corpsecret'=>'length:0,50',
        'token|加密token'=>'length:0,50',
        'msg_type|消息类型msg_type'=>'in:text,voice,video,music,news,image,transfer_customer_service',
        'to_user_name|接收用户to_user_name，即openid'=>'length:0,50',
        'from_user_name|发送者from_user_name，即原始id'=>'length:0,50',
        'content|内容content'=>'length:0,255',
        'media_id|媒体media_id'=>'length:0,50',
        'title|标题title'=>'length:0,50',
        'description|描述description'=>'length:0,255',
        'music_url|音乐链接music_url'=>'length:0,255',
        'hq_music_url|hq音乐链接hq_music_url'=>'length:0,255',
        'article_counts|文章个数article_counts'=>'between:1,8',
        'pic_url|图片链接pic_url'=>'length:0,255',
        'url|跳转链接url'=>'length:0,255',
        'article_content|文章内容article_content'=>'array',
        'expire_seconds|过期时间expire_seconds'=>'number',
        'action_name|二维码类型action_name'=>'in:QR_SCENE,QR_STR_SCENE',
        'action_info|二维码详细信息action_info'=>'array',
        'access_token|access_token'=>'length:0,255',
        'id|部门ID'=>'number',
        'name|部门名称name'=>'length:0,32',
        'name_en|部门名称name_en'=>'length:0,32',
        'parentid|父级部门parentid'=>'number',
        'order|排序order'=>'number',
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