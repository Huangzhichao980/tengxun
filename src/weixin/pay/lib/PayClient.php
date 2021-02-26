<?php
namespace panthsoni\tengxun\weixin\pay\lib;

use panthsoni\tengxun\common\CommonApi;
use panthsoni\tengxun\common\SingleValidate;

class PayClient extends CommonApi
{
    /**
     * 签名类型
     * @var array
     */
    protected static $signType = 'MD5';

    /**
     * 基础配置参数
     * @var array
     */
    protected static $options = [
        'sign_type' => 'MD5'
    ];

    /**
     * 必传参数
     * @var array
     */
    protected static $params = [];

    /**
     * 可选参数
     * @var array
     */
    protected static $bizParams = [];

    /**
     * 支付网关
     * @var string
     */
    protected static $domain = 'https://api.mch.weixin.qq.com';

    /**
     * 支付方法
     * @var string
     */
    protected static $method = '';

    /**
     * 请求链接
     * @var string
     */
    protected static $requestUrl = '';

    /**
     * 支付密钥
     * @var string
     */
    protected static $key = '';

    /**
     * cert证书路径
     * @var string
     */
    protected static $sslCertPath = '';

    /**
     * key证书路径
     * @var string
     */
    protected static $sslKeyPath = '';

    /**
     * 是否需要证书
     * @var bool
     */
    protected static $isNeedCert = false;

    /**
     * 代理ip地址
     * @var string
     */
    protected static $proxyHost = '0.0.0.0';

    /**
     * 代理端口
     * @var int
     */
    protected static $proxyPort = 0;

    /**
     * 初始化
     * PayClient constructor.
     * @param array $options
     */
    public function __construct($options=[]){
        self::$options = array_merge(self::$options,$options);
    }

    /**
     * 设置配置参数
     * @param array $options
     * @return $this
     */
    public function setOptions($options=[]){
        self::$options = array_merge(self::$options,$options);
        return $this;
    }

    /**
     * 设置参数
     * @param array $params
     * @return $this
     */
    public function setParams($params=[]){
        self::$params = array_merge(self::$params,$params);
        return $this;
    }

    /**
     * 设置可选参数
     * @param array $bizParams
     * @return $this
     */
    public function setBizParams($bizParams=[]){
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
     * 设置签名方式
     * @param string $signType
     * @return $this
     */
    public function setSignType($signType='MD5'){
        self::$options = array_merge(self::$options,['sign_type'=>$signType]);
        self::$signType = $signType;
        return $this;
    }

    /**
     * 设置支付密钥
     * @param $key
     * @return $this
     */
    public function setKey($key){
        self::$key = $key;
        return $this;
    }

    /**
     * 设置ssl_cert_path
     * @param $sslCertPath
     * @return $this
     */
    public function setSslCertPath($sslCertPath){
        self::$sslCertPath = $sslCertPath;
        return $this;
    }

    /**
     * 设置ssl_key_path
     * @param $sslKeyPath
     * @return $this
     */
    public function setSslKeyPath($sslKeyPath){
        self::$sslKeyPath = $sslKeyPath;
        return $this;
    }

    /**
     * 设置proxyHost
     * @param $proxyHost
     * @return $this
     */
    public function setProxyHost($proxyHost){
        self::$proxyHost = $proxyHost;
        return $this;
    }

    /**
     * proxyPort
     * @param $proxyPort
     * @return $this
     */
    public function setProxyPort($proxyPort){
        self::$proxyPort = $proxyPort;
        return $this;
    }

    /**
     * 获取结果
     * @return mixed
     * @throws \Exception
     */
    public function getResult(){
        /*请求方法是否设置*/
        if (!self::$method){
            throw new \Exception('请求方法缺失',-10015);
        }

        /*检测支付密钥*/
        if (!self::$key){
            throw new \Exception('支付密钥key缺失',-10030);
        }

        /*检测请求方法是否授权*/
        if (!isset(self::$methodList[self::$method]) || (isset(self::$methodList[self::$method]) && !self::$methodList[self::$method])){
            throw new \Exception('请求方法未授权',-10025);
        }

        /*参数验证*/
        $originalRequestParamsList = array_merge(self::$options,self::$params,self::$bizParams);
        $requestParamsList = Tools::validate($originalRequestParamsList,new SingleValidate(),self::$method);

        /*组建请求链接*/
        self::$requestUrl = preg_match('/^http(s)?:\\/\\/.+/',self::$methodList[self::$method]['request_uri'])?self::$methodList[self::$method]['request_uri']:self::$domain.self::$methodList[self::$method]['request_uri'];

        /*设置是否需要证书*/
        self::$isNeedCert = self::$methodList[self::$method]['is_need_cert'];
        if (self::$isNeedCert && (!self::$sslKeyPath || !self::$sslCertPath)){
            throw new \Exception('证书路径缺失',-10031);
        }

        return Tools::buildRequestResult(self::$requestUrl,$requestParamsList,self::$key,self::$isNeedCert,self::$sslCertPath,self::$sslKeyPath,self::$proxyHost,self::$proxyPort,self::$method,self::$signType);
    }
}