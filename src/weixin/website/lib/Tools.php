<?php
namespace tencent\wechat\open\website\lib;

use tencent\wechat\commonality\CommonalityTools;

class Tools extends CommonalityTools
{
    /**
     * Get参数替换
     * @var array
     */
    protected static $paramsReplaceList = [
        'appid' => '[appid]',
        'secret' => '[secret]',
        'code' => '[code]',
        'refresh_token' => '[refresh_token]',
        'openid' => '[openid]',
        'access_token' => '[access_token]',
        'redirect_uri' => '[redirect_uri]',
        'scope' => '[scope]',
        'state' => '[state]',
        'lang' => '[lang]'
    ];

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
}