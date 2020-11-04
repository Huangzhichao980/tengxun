<?php
namespace panthsoni\tengxun\weixin\pay\lib;

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
     * @param $key
     * @param $isNeedCert
     * @param $sslCertPath
     * @param $sslKeyPath
     * @param $proxyHost
     * @param $proxyPort
     * @param $method
     * @return mixed
     * @throws \Exception
     */
    public static function buildRequestResult($requestUrl,$requestParams,$key,$isNeedCert,$sslCertPath,$sslKeyPath,$proxyHost,$proxyPort,$method){
        /*针对jsapi和Navicat支付方式*/
        if ($method == 'unified_order'){
            if ($requestParams['trade_type'] == 'JSAPI' && !isset($requestParams['openid'])){
                throw new \Exception('用户openid缺失',-10032);
            }

            if ($requestParams['trade_type'] == 'NATIVE' && !isset($requestParams['product_id'])){
                throw new \Exception('商品ID缺失',-10033);
            }
        }

        /*订单查询*/
        if ($method == 'order_query'){
            if (!isset($requestParams['transaction_id']) && !isset($requestParams['out_trade_no'])){
                throw new \Exception('微信订单号或商户订单号必须二选一',-10033);
            }

            if (isset($requestParams['transaction_id']) && isset($requestParams['out_trade_no'])){
                unset($requestParams['out_trade_no']);
            }
        }

        /*生成支付签名*/
        $requestParams['sign'] = self::makePaySign($requestParams,$key,$requestParams['sign_type']);

        /*生成xml字符串*/
        $xmlString = self::buildXmlParams($requestParams);

        /*curl请求*/
        $res = self::payHttpCurl($requestParams,$xmlString,$requestUrl,$isNeedCert,$sslCertPath,$sslKeyPath,$proxyHost,$proxyPort);
        return self::xmlToArray($res);
    }

    /**
     * 生成签名
     * @param $params
     * @param $key
     * @param string $signType
     * @return string
     */
    private static function makePaySign($params,$key,$signType='MD5'){
        /*参数键值按字典排序*/
        $keyValueArr = [];
        foreach ($params as $key=>$val){
            $keyValueArr[] = $key;
        }
        sort($keyValueArr,SORT_STRING);

        /*将参数按照key=value模式进行字符串拼接*/
        $keyString = '';
        foreach ($keyValueArr as $key=>$val){
            if (is_array($params[$val])) $params[$val] = json_encode($params[$val]);
            if ($key == (count($keyValueArr)-1)){
                $keyString .= "{$val}={$params[$val]}";
            }else{
                $keyString .= "{$val}={$params[$val]}&";
            }
        }

        /*拼接api密钥*/
        $keyString = "{$keyString}&key={$key}";

        /*md5或者HMAC-SHA256签名*/
        $sign = strtoupper(md5($keyString));
        if ($signType == 'HMAC-SHA256'){
            $sign = strtoupper(hash_hmac('sha256',$keyString,$key));
        }

        return $sign;
    }

    /**
     * 组建xml数据
     * @param $params
     * @return string
     */
    private static function buildXmlParams($params=[]){
        $xml = "<xml>";
        foreach ($params as $key=>$val){
            if (is_array($val)) $val = json_encode($val);
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }

    /**
     * 以post方式提交xml到对应的接口url
     * @param $params
     * @param $xml
     * @param $url
     * @param bool $isNeedCert
     * @param $sslCertPath
     * @param $sslKeyPath
     * @param int $second
     * @param string $proxyHost
     * @param int $proxyPort
     * @return mixed
     */
    private static function payHttpCurl($params,$xml,$url,$isNeedCert,$sslCertPath,$sslKeyPath,$proxyHost,$proxyPort,$second=30){
        $ch = curl_init();
        $curlVersion = curl_version();
        $userAgent = "WXPaySDK/3.0.9 (" . PHP_OS . ") PHP/" . PHP_VERSION . " CURL/" . $curlVersion['version'] . " " . $params['mch_id'];

        /*如果有配置代理这里就设置代理*/
        if ($proxyHost != "0.0.0.0" && $proxyPort != 0) {
            curl_setopt($ch, CURLOPT_PROXY, $proxyHost);
            curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
        }

        /*设置证书,使用证书：cert 与 key 分别属于两个.pem文件,证书文件请放入服务器的非web目录下*/
        if ($isNeedCert == true) {
            curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLCERT, $sslCertPath);
            curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLKEY, $sslKeyPath);
        }

        /*请求参数配置*/
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);//严格校验
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);   //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);  //设置超时
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    /**
     * xml转数组
     * @param $xml
     * @return mixed
     */
    protected static function xmlToArray($xml){
        $ob= simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($ob);
        $configData = json_decode($json, true);

        return $configData;
    }
}