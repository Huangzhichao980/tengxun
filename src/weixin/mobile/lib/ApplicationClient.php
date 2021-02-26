<?php
namespace panthsoni\tengxun\weixin\mobile\lib;

use panthsoni\tengxun\common\CommonApi;
use panthsoni\tengxun\common\SingleValidate;

class ApplicationClient extends CommonApi
{
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
     * 请求方法
     * @var string
     */
    protected static $method='';

    /**
     * 微信请求网关
     * @var string
     */
    protected static $domain = 'https://api.weixin.qq.com';

    /**
     * 不需要请求URL的方法
     * @var array
     */
    protected static $notRequestUrlMethods = [];

    /**
     * 请求链接
     * @var string
     */
    protected static $requestUrl;

    /**
     * 是否返回链接
     * @var bool
     */
    protected static $isBackUrl = false;

    /**
     * 初始化
     * ApplicationClient constructor.
     * @param array $options
     */
    public function __construct(array $options=[]){
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
     * 获取结果
     * @return bool|mixed
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
        $requestParamsList = Tools::validate(array_merge(self::$options,self::$params,self::$bizParams),new SingleValidate(),self::$method);

        return Tools::buildRequestResult(self::$requestUrl,$requestParamsList,self::$methodList[self::$method]['request_way'],self::$isBackUrl);
    }
}