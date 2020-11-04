<?php
namespace panthsoni\tengxun\weixin\pay\lib;

use panthsoni\tengxun\common\CommonValidate;

class SingleValidate extends CommonValidate
{
    protected $rule = [
        'appid|公众账号ID' => 'length:0,32',
        'mch_id|商户号' => 'length:0,32',
        'device_info|设备号' => 'length:0,32',
        'nonce_str|随机字符串' => 'length:0,32',
        'sign|签名' => 'length:0,32',
        'sign_type|签名类型' => 'length:0,32',
        'body|商品描述' => 'length:0,128',
        'detail|商品详情' => 'length:0,6000',
        'attach|附加数据' => 'length:0,127',
        'out_trade_no|商户订单号' => 'length:0,32',
        'total_fee|订单金额' => 'number',
        'fee_type|货币类型' => 'length:0,16',
        'spbill_create_ip|终端ip' => 'length:0,64',
        'goods_tag|订单优惠标记' => 'length:0,32',
        'limit_pay|指定支付方式' => 'length:0,32',
        'time_start|交易起始时间' => 'length:0,14',
        'time_expire|交易结束时间' => 'length:0,14',
        'receipt|电子发票入口开放标识' => 'length:0,8',
        'auth_code|授权码' => 'length:0,128',
        'scene_info|场景信息' => 'array',
        'notify_url|异步通知地址' => 'length:0,255',
        'trade_type|交易类型' => 'length:0,16',
        'product_id|商品id' => 'length:0,32',
        'openid|用户openid' => 'length:0,32',
        'transaction_id|微信订单号' => 'length:0,32',
        'mch_appid|商户账号appid' => 'length:0,50',
        'mchid|商户号' => 'length:0,32',
        'partner_trade_no|商户订单号' => 'length:0,32',
        'check_name|校验用户姓名选项' => 'in:NO_CHECK,FORCE_CHECK',
        'desc|企业付款备注' => 'length:0,100',
        'amount|金额' => 'number',
        're_user_name|真实用户名' => 'length:0,50'
    ];

    public $scene = [
        'micro_pay'=>[
            'appid' => 'require|length:0,32',
            'mch_id' => 'require|length:0,32',
            'nonce_str' => 'require|length:0,32',
            'body' => 'require|length:0,128',
            'out_trade_no' => 'require|length:0,32',
            'total_fee' => 'require|number',
            'spbill_create_ip' => 'require|length:0,64',
            'auth_code' => 'require|length:0,128',
            'device_info','sign_type','detail','attach','fee_type',
            'goods_tag','limit_pay','time_start','time_expire','receipt','scene_info'
        ],
        'unified_order'=>[
            'appid' => 'require|length:0,32',
            'mch_id' => 'require|length:0,32',
            'nonce_str' => 'require|length:0,32',
            'body' => 'require|length:0,128',
            'out_trade_no' => 'require|length:0,32',
            'total_fee' => 'require|number',
            'spbill_create_ip' => 'require|length:0,64',
            'notify_url' => 'require|length:0,255',
            'trade_type' => 'require|length:0,16',
            'device_info','sign_type','detail','attach','fee_type','product_id','openid',
            'goods_tag','limit_pay','time_start','time_expire','receipt','scene_info'
        ],

        'order_query' => [
            'appid' => 'require|length:0,32',
            'mch_id' => 'require|length:0,32',
            'nonce_str' => 'require|length:0,32',
            'sign_type','transaction_id','out_trade_no'
        ],

        'close_order' => [
            'mch_appid' => 'require|length:0,32',
            'mch_id' => 'require|length:0,32',
            'nonce_str' => 'require|length:0,32',
            'out_trade_no' => 'require|in:NO_CHECK,FORCE_CHECK',
            'sign_type'
        ],

        'transfers' => [
            'appid' => 'require|length:0,32',
            'mchid' => 'require|length:0,32',
            'nonce_str' => 'require|length:0,32',
            'partner_trade_no' => 'require|length:0,32',
            'openid' => 'require|length:0,32',
            'check_name' => 'require|in:NO_CHECK,FORCE_CHECK',
            'amount' => 'require|number',
            'desc' => 'require|length:0,100',
            're_user_name',
        ]
    ];
}