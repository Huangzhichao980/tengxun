<?php
namespace panthsoni\tengxun\weixin\corporation;

use panthsoni\tengxun\weixin\corporation\lib\CorporationClient;

class Corporation
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
     * @return CorporationClient
     */
    public static function init($options=[]){
        self::$options = array_merge(self::$options,$options);
        return new CorporationClient(self::$options);
    }
}