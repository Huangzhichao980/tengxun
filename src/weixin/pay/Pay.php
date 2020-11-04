<?php
namespace panthsoni\tengxun\weixin\pay;

use panthsoni\tengxun\weixin\pay\lib\PayClient;

class Pay
{
    /**
     * 基础配置参数
     * @var array
     */
    protected static $options=[];

    /**
     * 初始化
     * Pay constructor.
     * @param array $options
     */
    public function __construct($options=[]){
        self::$options = array_merge(self::$options,$options);
    }

    /**
     * 初始化
     * @param array $options
     * @return PayClient
     */
    public static function init($options=[]){
        self::$options = array_merge(self::$options,$options);
        return new PayClient(self::$options);
    }
}