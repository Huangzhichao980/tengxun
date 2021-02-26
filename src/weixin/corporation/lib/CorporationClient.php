<?php
namespace panthsoni\tengxun\weixin\corporation\lib;

use panthsoni\tengxun\common\CommonApi;
use panthsoni\tengxun\common\SingleValidate;

class CorporationClient extends CommonApi
{
    /**
     * 微信请求网关
     * @var string
     */
    protected static $domain = 'https://qyapi.weixin.qq.com';

    /**
     * 请求方法
     * @var string
     */
    protected static $method='';

    /**
     * 配置参数
     * @var array
     */
    protected static $options = [];

    /**
     * 请求参数
     * @var array
     */
    protected static $params = [];

    /**
     * 可选参数
     * @var array
     */
    protected static $bizParams = [];

    /**
     * 是否安全模式，默认为明文模式
     * @var bool
     */
    protected static $isSafe = false;

    /**
     * 请求链接
     * @var string
     */
    protected static $requestUrl;
    /**
     * 不需要请求URL的方法
     * @var array
     */
    protected static $notRequestUrlMethods = ['listenCorporation','replyMessage'];

    /**
     * 是否返回链接
     * @var bool
     */
    protected static $isBackUrl = false;

    /**
     * 初始化
     * DeveloperClient constructor.
     * @param array $options
     */
    public function __construct(array $options=[]){
        /*基本配置参数*/
        self::$options = array_merge(self::$options,$options);
    }

    /**
     * 设置相关配置
     * @param $options
     * @return $this
     */
    public function setOptions(array $options){
        self::$options = array_merge(self::$options,$options);
        return $this;
    }

    /**
     * 设置必传参数
     * @param $params
     * @return $this
     */
    public function setParams(array $params){
        self::$params = array_merge(self::$params,$params);
        return $this;
    }

    /**
     * 设置可选参数
     * @param $bizParams
     * @return $this
     */
    public function setBizParams(array $bizParams){
        self::$bizParams = array_merge(self::$bizParams,$bizParams);
        return $this;
    }

    /**
     * 设置方法
     * @param $method
     * @return $this
     */
    public function setMethod($method){
        self::$method = $method;
        return $this;
    }

    /**
     * 是否返回链接
     * @param $isBackUrl
     * @return $this
     */
    public function isBackUrl($isBackUrl=false){
        self::$isBackUrl = $isBackUrl;
        return $this;
    }

    /**
     * 设置是否安全模式
     * @param bool $isSafe
     * @return $this
     */
    public function setIsSafe($isSafe=false){
        self::$isSafe = $isSafe;
        return $this;
    }

    /**
     * 获取结果
     * @return bool|int|mixed|string
     * @throws \Exception
     */
    public function getResult(){
        /*检测方法*/
        if (!self::$method) throw new \Exception('请求方法缺失',-10015);

        /*检测请求方式是否存在*/
        if (!in_array(self::$method,self::$notRequestUrlMethods)){
            if (!isset(self::$methodList[self::$method]) || (isset(self::$methodList[self::$method]) && !self::$methodList[self::$method])){
                throw new \Exception('请求方法未授权',-10025);
            }

            self::$requestUrl = preg_match('/^http(s)?:\\/\\/.+/',self::$methodList[self::$method]['request_uri'])?self::$methodList[self::$method]['request_uri']:self::$domain.self::$methodList[self::$method]['request_uri'];
        }

        /*参数验证*/
        $originalRequestParamsList = array_merge(self::$options,self::$params,self::$bizParams);
        $requestParamsList = Tools::validate($originalRequestParamsList,new SingleValidate(),self::$method);

        /*监听方法*/
        if (self::$method === 'listenCorporation') return Tools::listen($requestParamsList);

        /*回复用户消息*/
        if (self::$method === 'replyMessage') return Tools::replyMessage($originalRequestParamsList,self::$isSafe);

        return Tools::buildRequestResult(self::$requestUrl,$requestParamsList,self::$methodList[self::$method]['request_way'],self::$isBackUrl);
    }
}