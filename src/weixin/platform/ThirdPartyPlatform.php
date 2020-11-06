<?php
namespace panthsoni\tengxun\weixin\platform;

use panthsoni\tengxun\weixin\platform\lib\ThirdPartyPlatformClient;

class ThirdPartyPlatform
{
    protected static $options = [];
    public function __construct(array $options=[]){
        self::$options = array_merge(self::$options,$options);
    }

    /**
     * 初始化配置
     * @param array $options
     * @return ThirdPartyPlatformClient
     */
    public static function init(array $options=[]){
        self::$options = array_merge(self::$options,$options);
        return new ThirdPartyPlatformClient(self::$options);
    }
}