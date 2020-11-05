# tengxun
>腾讯集团微信、扣扣等开发包

## 安装
> composer require panthsoni/tengxun

## 使用方法
### 1、微信开发者模式

```
namespace app\example;

use panthsoni\tengxun\weixin\developer\Developer;

class Example {
    /*构造方法*/
    protect static $method = []
    protect static $developer;
    public function __construct(){
        self::$developer = Developer::init([
            'appid' => '',    //公众号appid，非必填，仅当安全模式下必填
            'encoding_aes_key' => '',  //随机密钥，非必填，仅当安全模式下必填
            'msg_signature' => '',  //消息签名，非必填，仅当安全模式下必填
        ]);
    }

    /*微信监听方法*/
    public function listen(){
        /*微信监听，setMethod为listen，当setIsSafe为true时，模式为安全模式，返回数组格式*/
        $res = self::$developer->setParams([
            'signature' => '',  //签名
            'timestamp' => 1562212362,
            'nonce' => '',  //随机字符串
            'token' => '',   //token码
            'echostr' => '',  //非必填，仅当第一次验证时传入
        ])->setMethod('listen')->setIsSafe(true)->getResult();
    }

    /*被动回复用户信息方法*/
    public function replyMessage(){
        /*微信监听，setMethod为replyMessage，当setIsSafe为true时，模式为安全模式，返回数组格式*/
        $res = self::$developer->setParams([
            'msg_type' => '',   //消息类型，text,voice,video,music,news,image,transfer_customer_service
            'to_user_name' => '',   //接收用户openid
            'from_user_name' => ''   //发送者
        ])->setBizParams([
            'content' => '',   //内容，仅当消息类型为text时，必填
            'media_id' => '',   //媒体ID，仅当消息类型为voice,video,music,image时，必填
            'title' => '',    //非必填，标题
            'description' => '',   //非必填，描述
            'music_url' => '',   //非必填，音乐链接
            'hq_music_url' => '',   //非必填，音乐hq链接
            'article_counts' => 1,  //文章个数，仅当消息类型为news时，必填
            'article_content' => [
                [
                    'title' => '',   //标题，仅当消息类型为news时，必填
                    'description' => '',   //描述，仅当消息类型为news时，必填
                    'pic_url' => '',   //图片链接，仅当消息类型为news时，必填
                    'url' => '',   //跳转链接，仅当消息类型为news时，必填
                ]
            ]
        ])->setMethod('replyMessage')->setIsSafe(true)->getResult();
    }
}
