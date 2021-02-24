<?php
namespace panthsoni\tengxun\weixin\platform\lib;

use panthsoni\tengxun\common\CommonCryption;
use panthsoni\tengxun\common\CommonTools;

class Tools extends CommonTools
{
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
     * 监听开放平台
     * @param $requestParams
     * @return int|mixed
     * @throws \Exception
     */
    public static function listen($requestParams){
        /*获取加密的消息体*/
        $requestParams['post_data'] = file_get_contents('php://input');

        /*检测消息加解密类型*/
        if ($requestParams['encrypt_type']!='aes'){
            throw new \Exception('encrypt_type缺失',-10029);
        }

        return self::decryptMsg($requestParams);
    }

    /**
     * 监听公众号
     * @param $requestParamsList
     * @return int|mixed
     */
    public static function listenAccount($requestParamsList){
        /*接收微信数据包*/
        $requestParamsList['post_data'] = file_get_contents('php://input');

        /*响应消息*/
        return self::decryptMsg($requestParamsList);
    }

    /**
     * 回复用户消息
     * @param $requestParamsList
     * @return int|string
     * @throws \Exception
     */
    public static function replyMessage($requestParamsList){
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

        /*加密处理*/
        $encryptMsg = "";
        $cryptGraph = new CommonCryption($requestParamsList['token'],$requestParamsList['encoding_aes_key'],$requestParamsList['component_appid']);
        $errorCode = $cryptGraph->encryptMsg($content,time(),'panthsoni',$encryptMsg);
        if ($errorCode !=0) return $errorCode;

        return $encryptMsg;
    }
}