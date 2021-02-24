<?php
namespace panthsoni\tengxun\common;

class CommonTools
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
        'lang' => '[lang]',
        'component_appid' => '[component_appid]',
        'pre_auth_code' => '[pre_auth_code]',
        'auth_type' => '[auth_type]',
        'component_access_token' => '[component_access_token]',
        'corpid' => '[corpid]',
        'corpsecret' => '[corpsecret]',
        'userid' => '[userid]',
        'department_id' => '[department_id]',
        'fetch_child' => '[fetch_child]',
        'size_type' => '[size_type]',
        'id' => '[id]',
        'js_code' => '[js_code]',
    ];

    /**
     * CommonTools constructor.
     */
    public function __construct(){}

    /**
     * 组建xml消息
     * @param $requestParamsList
     * @return string
     */
    protected static function buildXmlMessage($requestParamsList){
        switch ($requestParamsList['msg_type']){
            case 'text':
                return sprintf(CommonTemplate::$template[$requestParamsList['msg_type']],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time(),$requestParamsList['content']);
                break;
            case 'voice':
                return sprintf(CommonTemplate::$template[$requestParamsList['msg_type']],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time(),$requestParamsList['media_id']);
                break;
            case 'video':
                return sprintf(CommonTemplate::$template[$requestParamsList['msg_type']],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time(),$requestParamsList['media_id'],isset($requestParamsList['title'])?$requestParamsList['title']:'',isset($requestParamsList['description'])?$requestParamsList['description']:'');
                break;
            case 'music':
                return sprintf(CommonTemplate::$template[$requestParamsList['msg_type']],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time(),$requestParamsList['media_id'],isset($requestParamsList['title'])?$requestParamsList['title']:'',isset($requestParamsList['description'])?$requestParamsList['description']:'',isset($requestParamsList['music_url'])?$requestParamsList['music_url']:'',isset($requestParamsList['hq_music_url'])?$requestParamsList['hq_music_url']:'');
                break;
            case 'image':
                return sprintf(CommonTemplate::$template[$requestParamsList['msg_type']],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time(),$requestParamsList['media_id']);
                break;
            case 'news':
                return sprintf(CommonTemplate::$template[$requestParamsList['msg_type']]['main'],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time(),$requestParamsList['article_counts'],self::buildNewsItem($requestParamsList['article_content']));
                break;
            case 'transfer_customer_service':
                return self::buildServiceTemplate($requestParamsList);
                break;
            default:
                return 'success';
                break;
        }
    }

    /**
     * 组建图文的item数据
     * @param $articleContent
     * @return string
     */
    protected static function buildNewsItem($articleContent){
        $item = '';
        foreach ($articleContent as $val){
            $item .= sprintf(CommonTemplate::$template['news']['item'],$val['title'],$val['description'],$val['pic_url'],$val['url']);
        }

        return $item;
    }

    /**
     * 组建客服模板消息
     * @param $requestParamsList
     * @return string
     */
    protected static function buildServiceTemplate($requestParamsList){
        $template = sprintf(CommonTemplate::$template[$requestParamsList['msg_type']]['main'],$requestParamsList['to_user_name'],$requestParamsList['from_user_name'],time());

        /*指定客服*/
        if (isset($requestParamsList['kf_account'])){
            $item = sprintf(CommonTemplate::$template[$requestParamsList['msg_type']]['item'],$requestParamsList['kf_account']);
            $template .= $item;
        }

        $template .= "</xml>";

        return $template;
    }

    /**
     * 消息解密
     * @param array $data
     * @return int|mixed
     */
    protected static function decryptMsg($data=[]){
        /*提取数据包加密信息*/
        $domDocument = new \DOMDocument();
        $domDocument->loadXML($data['post_data']);
        $encrypt = $domDocument->getElementsByTagName('Encrypt')->item(0)->nodeValue;

        /*构建消息格式并解密*/
        $msg = "";
        $fromXml = sprintf("<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>", $encrypt);
        $cryptGraph = new CommonCryption($data['token'],$data['encoding_aes_key'],isset($data['appid'])?$data['appid']:$data['component_appid']);
        $errorCode = $cryptGraph->decryptMsg($data['msg_signature'],$data['timestamp'],$data['nonce'],$fromXml,$msg);
        if ($errorCode !=0) return $errorCode;

        /*将xml数据转为数组*/
        return self::xmlToArray($msg);
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

    /**
     * curl请求
     * @param string $url
     * @param string $requestWay
     * @param array $params
     * @return bool|mixed
     */
    protected static function httpCurl($url='',$requestWay='GET',$params=[]){
        if (!$url) return false;

        /*curl请求*/
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//设置header
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if ($requestWay == 'POST'){
            curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params,JSON_UNESCAPED_UNICODE));
        }
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return json_decode($data,true);
    }

    /**
     * 数据验证
     * @param $data
     * @param $validate
     * @param $scene
     * @return array
     * @throws \Exception
     */
    public static function validate($data,$validate,$scene){
        /*数据接收*/
        if (!is_array($data)) throw new \Exception('参数必须为数组',-10001);

        /*验证场景验证*/
        if (!$scene) throw new \Exception('场景不能为空',-10002);

        $validate->scene($scene);

        /*数据验证*/
        if (!$validate->check($data)){
            throw new \Exception($validate->getError(),-10003);
        }

        $scene = $validate->scene[$scene];
        $_scene = [];
        foreach ($scene as $key => $val){
            if(is_numeric($key)){
                $_scene[] = $val;
            }else{
                $_scene[] = $key;
            }
        }

        $_data = [];
        foreach ($data as $key=>$val){
            if ($val === '' || $val === null) continue;

            if(is_numeric($key)){
                if(in_array($key,$_scene)) $_data[$key] = $val;
            }else{
                if(in_array($key,$_scene)) $_data[$key] = $val;
            }
        }

        return $_data;
    }
}