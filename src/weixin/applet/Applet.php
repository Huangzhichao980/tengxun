<?php
namespace panthsoni\tengxun\weixin\applet;


use panthsoni\tengxun\weixin\applet\lib\AppletClient;

class Applet
{
    /**
     * 基础配置参数
     * @var array
     */
    protected static $options = [];

    /**
     * 初始化
     * Developer constructor.
     * @param array $options
     */
    public function __construct(array $options=[]){
        self::$options = array_merge($options,self::$options);
    }

    /**
     * 初始化配置
     * @param array $options
     * @return AppletClient
     */
    public static function init(array $options=[]){
        self::$options = array_merge(self::$options,$options);
        return new AppletClient(self::$options);
    }
}