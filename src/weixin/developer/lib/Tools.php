<?php
namespace panthsoni\tengxun\weixin\developer\lib;

use panthsoni\tengxun\common\CommonCryption;
use panthsoni\tengxun\common\CommonTools;

class Tools extends CommonTools
{
    /**
     * 实例化
     * Tools constructor.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * 组建请求结果
     * @param $requestUrl
     * @param $requestParams
     * @param $requestWay
     * @param bool $isBackUrl
     * @return bool|mixed
     */
    public static function buildRequestResult($requestUrl,$requestParams,$requestWay,$isBackUrl=false){
        /*替换参数处理*/
        $replaceParams = [];
        $replaceValues = [];
        foreach (self::$paramsReplaceList as $key=>$val){
            $replaceParams[] = $val;
            $replaceValues[] = isset($requestParams[$key])?$requestParams[$key]:'';
        }

        /*替换结果*/
        $requestUrl = str_replace($replaceParams,$replaceValues,$requestUrl);

        /*根据不同的请求方式，将参数进行过滤*/
        $getParams = explode('&',isset(explode('?',$requestUrl)[1])?explode('?',$requestUrl)[1]:'');
        foreach ($getParams as $val){
            $val = explode('=',$val)[0];
            if (isset($requestParams[$val])) unset($requestParams[$val]);
        }

        /*返回链接*/
        if ($isBackUrl) return $requestUrl;

        /*curl请求*/
        return self::httpCurl($requestUrl,$requestWay,$requestParams);
    }

    /**
     * 公众号监听事件
     * @param $requestParamsList
     * @param $isSafe
     * @return int|mixed
     * @throws \Exception
     */
    public static function listen($requestParamsList,$isSafe){
        /*判断token*/
        if (isset($requestParamsList['echostr']) || $isSafe){
            /*判断是否设置token*/
            if (!isset($requestParamsList['token'])){
                throw new \Exception('token缺失',-10026);
            }
        }

        /*是否首次接入*/
        if (isset($requestParamsList['echostr'])){
            $signature = self::makeSignature($requestParamsList);
            if ($signature != $requestParamsList['signature']){
                throw new \Exception('signature校验错误',-10023);
            }

            exit($requestParamsList['echostr']);
        }

        /*接收微信数据包*/
        $requestParamsList['post_data'] = file_get_contents('php://input');

        /*响应消息*/
        return self::response($requestParamsList,$isSafe);
    }

    /**
     * 响应用户信息
     * @param $requestParamsList
     * @param $isSafe
     * @return int|mixed
     * @throws \Exception
     */
    protected static function response($requestParamsList,$isSafe){
        /*是否安全模式*/
        if ($isSafe){
            /*判断是否设置公众号appid*/
            if (!isset($requestParamsList['appid'])) throw new \Exception('缺少必备的appid参数',-10004);

            /*验证是否设置aes_key*/
            if (!isset($requestParamsList['encoding_aes_key'])) throw new \Exception('encoding_aes_key缺失',-10027);

            /*检测消息签名*/
            if (!isset($requestParamsList['msg_signature'])) throw new \Exception('msg_signature缺失',-10028);

            /*消息解密*/
            return self::decryptMsg($requestParamsList);
        }

        return self::xmlToArray($requestParamsList['post_data']);
    }

    /**
     * 回复用户消息
     * @param $requestParamsList
     * @param $isSafe
     * @return int|string
     * @throws \Exception
     */
    public static function replyMessage($requestParamsList,$isSafe){
        Tools::validate($requestParamsList,new SingleValidate(),$requestParamsList['msg_type']);

        /*图文消息处理参数*/
        if ($requestParamsList['msg_type'] == 'news'){
            /*处理文章个数和内容个数是否对应*/
            if ($requestParamsList['article_counts'] != count($requestParamsList['article_content'])){
                throw new \Exception('文章个数与文章内容设置的个数不一致',-10040);
            }

            /*处理参数*/
            foreach ($requestParamsList['article_content'] as $val){
                Tools::validate($val,new SingleValidate(),'news_item');
            }
        }

        /*组建消息xml*/
        $content = self::buildXmlMessage($requestParamsList);

        /*是否安全模式，需要加密处理*/
        if ($isSafe){
            /*判断是否设置token*/
            if (!isset($requestParamsList['token'])) throw new \Exception('token缺失',-10026);

            /*判断是否设置公众号appid*/
            if (!isset($requestParamsList['appid'])) throw new \Exception('缺少必备的appid参数',-10004);

            /*验证是否设置aes_key*/
            if (!isset($requestParamsList['encoding_aes_key'])) throw new \Exception('encoding_aes_key缺失',-10027);

            /*加密处理*/
            $encryptMsg = "";
            $cryptGraph = new CommonCryption($requestParamsList['token'],$requestParamsList['encoding_aes_key'],$requestParamsList['appid']);
            $errorCode = $cryptGraph->encryptMsg($content,time(),'panthsoni',$encryptMsg);
            if ($errorCode !=0) return $errorCode;

            return $encryptMsg;
        }

        return $content;
    }

    /**
     * 生成签名
     * @param $requestParamsList
     * @return string
     */
    protected static function makeSignature($requestParamsList){
        /*生成签名*/
        $tmpArr = [$requestParamsList['token'],$requestParamsList['timestamp'],$requestParamsList['nonce']];
        sort($tmpArr, SORT_STRING);
        $signature = sha1(implode($tmpArr));

        return $signature;
    }
}