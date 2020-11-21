<?php
namespace panthsoni\tengxun\common;


class CommonApi
{
    /**
     * 请求方法列表（小程序）
     * @var array
     */
    protected static $appletMethodList = [
        /*登录*/
        'login' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/jscode2session?appid=[appid]&secret=[secret]&js_code=[js_code]&grant_type=authorization_code'
        ],

        /*获取用户信息*/
        'get_user_info' => [
            'request_way' => 'GET',
            'request_uri' => '/wxa/getpaidunionid?access_token=[access_token]&openid=[openid]'
        ],

        /*获取access_token*/
        'get_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/token?grant_type=client_credential&appid=[appid]&secret=[secret]'
        ],

        /**
         * 数据分析
         */
        'get_daily_retain' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappiddailyretaininfo?access_token=[access_token]'
        ],
        'get_monthly_retain' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappidmonthlyretaininfo?access_token=[access_token]'
        ],
        'get_weekly_retain' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappidweeklyretaininfo?access_token=[access_token]'
        ],
        'get_daily_summary' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappiddailysummarytrend?access_token=[access_token]'
        ],
        'get_daily_visit_trend' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappiddailyvisittrend?access_token=[access_token]'
        ],
        'get_monthly_visit_trend' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappidmonthlyvisittrend?access_token=[access_token]'
        ],
        'get_weekly_visit_trend' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappidweeklyvisittrend?access_token=[access_token]'
        ],
        'get_user_portrait' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappiduserportrait?access_token=[access_token]'
        ],
        'get_visit_distribution' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappidvisitdistribution?access_token=[access_token]'
        ],
        'get_visit_page' => [
            'request_way' => 'POST',
            'request_uri' => '/datacube/getweanalysisappidvisitpage?access_token=[access_token]'
        ],

        /**
         * 客服消息
         */
        'get_temp_media' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/media/get?access_token=[access_token]&media_id=[media_id]'
        ],
        'send' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/custom/send?access_token=[access_token]'
        ],
        'set_typing' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/custom/typing?access_token=[access_token]'
        ],
        'upload_temp_media' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/media/upload?access_token=[access_token]&type=[type]'
        ],

        /**
         * 统一服务消息
         */
        'uniform_send' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/wxopen/template/uniform_send?access_token=[access_token]'
        ],

        /**
         * 动态消息
         */
        'create_activity_id' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/wxopen/activityid/create?access_token=[access_token]'
        ],
        'set_update_table_msg' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/wxopen/updatablemsg/send?access_token=[access_token]'
        ],

        /**
         * 插件管理
         */
        'apply_plugin' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/plugin?access_token=[access_token]'
        ],
        'get_plugin_dev_apply_list' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/devplugin?access_token=[access_token]'
        ],
        'get_plugin_list' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/plugin?access_token=[access_token]'
        ],
        'set_dev_plugin_apply_status' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/devplugin?access_token=[access_token]'
        ],
        'unbind_plugin' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/plugin?access_token=[access_token]'
        ],

        /**
         * 附近小程序
         */
        'add_near_applet' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/addnearbypoi?access_token=[access_token]'
        ],
        'delete_near_applet' => [
            'request_way' => 'POST',
            'request_uri' => '/delnearbypoi?access_token=[access_token]'
        ],
        'get_near_applet_list' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/getnearbypoilist?page=1&page_rows=20&access_token=[access_token]'
        ],
        'set_show_status' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/setnearbypoishowstatus?access_token=[access_token]'
        ],

        /**
         * 小程序码
         */
        'create_qr_code' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/wxaapp/createwxaqrcode?access_token=[access_token]'
        ],
        'get_qr_code' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/getwxacode?access_token=[access_token]'
        ],
        'get_qr_code_unlimited' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/getwxacodeunlimit?access_token=[access_token]'
        ],

        /**
         * 内容安全
         */
        'img_sec_check' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/img_sec_check?access_token=[access_token]'
        ],
        'media_check_async' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/media_check_async?access_token=[access_token]'
        ],
        'msg_sec_check' => [
            'request_way' => 'POST',
            'request_uri' => '/wxa/msg_sec_check?access_token=[access_token]'
        ],

        /**
         * 广告
         */
        'add_user_action' => [
            'request_way' => 'POST',
            'request_uri' => '/marketing/user_actions/add'
        ],
        'add_user_action_set' => [
            'request_way' => 'POST',
            'request_uri' => '/marketing/user_action_sets/add'
        ],
        'get_user_action_set_reports' => [
            'request_way' => 'POST',
            'request_uri' => '/marketing/user_action_set_reports/get'
        ],
        'get_user_action_sets' => [
            'request_way' => 'POST',
            'request_uri' => '/marketing/user_action_sets/get'
        ],
    ];

    /**
     * 请求方法列表（开发者模式）
     * @var array
     */
    protected static $developerMethodList = [
        'get_base_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/token?grant_type=client_credential&appid=[appid]&secret=[secret]'
        ],

        /*菜单*/
        'create_menu' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/menu/create?access_token=[access_token]'
        ],
        'get_menu' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/get_current_selfmenu_info?access_token=[access_token]'
        ],
        'del_menu' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/menu/delete?access_token=[access_token]'
        ],
        'create_self_menu' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/menu/addconditional?access_token=[access_token]'
        ],
        'del_self_menu' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/menu/delconditional?access_token=[access_token]'
        ],
        'get_self_menu' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/menu/get?access_token=[access_token]'
        ],

        /*客服*/
        'create_account' => [
            'request_way' => 'POST',
            'request_uri' => '/customservice/kfaccount/add?access_token=[access_token]'
        ],
        'update_account' => [
            'request_way' => 'POST',
            'request_uri' => '/customservice/kfaccount/update?access_token=[access_token]'
        ],
        'del_account' => [
            'request_way' => 'POST',
            'request_uri' => '/customservice/kfaccount/del?access_token=[access_token]'
        ],
        'upload_headimg_account' => [
            'request_way' => 'POST',
            'request_uri' => '/customservice/kfaccount/uploadheadimg?access_token=[access_token]&kf_account=[kf_account]'
        ],
        'get_account' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/customservice/getkflist?access_token=[access_token]'
        ],
        'send_account_message' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/custom/send?access_token=[access_token]'
        ],
        'typing_account' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/custom/typing?access_token=[access_token]'
        ],

        /*模板消息*/
        'set_industry' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/template/api_set_industry?access_token=[access_token]'
        ],
        'get_industry' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/template/get_industry?access_token=[access_token]'
        ],
        'add_template' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/template/api_add_template?access_token=[access_token]'
        ],
        'get_template' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/template/get_all_private_template?access_token=[access_token]'
        ],
        'del_template' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/template/del_private_template?access_token=[access_token]'
        ],
        'send_template_message' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/template/send?access_token=[access_token]'
        ],

        /*网页授权*/
        'user_authorize' => [
            'request_way' => 'GET',
            'request_uri' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=[appid]&redirect_uri=[redirect_uri]&response_type=code&scope=[scope]&state=[state]#wechat_redirect'
        ],
        'get_authorize_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/access_token?appid=[appid]&secret=[secret]&code=[code]&grant_type=authorization_code'
        ],
        'refresh_authorize_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/refresh_token?appid=[appid]&grant_type=refresh_token&refresh_token=[refresh_token]'
        ],
        'get_user_info' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/userinfo?access_token=[access_token]&openid=[openid]&lang=[lang]'
        ],
        'check_auth' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/auth?access_token=[access_token]&openid=[openid]'
        ],

        /*用户管理*/
        'create_tag' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/tags/create?access_token=[access_token]'
        ],
        'get_tag' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/tags/get?access_token=[access_token]'
        ],
        'update_tag' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/tags/update?access_token=[access_token]'
        ],
        'del_tag' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/tags/delete?access_token=[access_token]'
        ],
        'get_tag_openid' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/user/tag/get?access_token=[access_token]'
        ],

        /*账号管理*/
        'qrcode_create' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/qrcode/create?access_token=[access_token]'
        ],
        'short_url' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/shorturl?access_token=[access_token]'
        ],

        /*微信小店管理*/
        'shop_goods_create' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/create?access_token=[access_token]'
        ],
        'shop_goods_del' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/del?access_token=[access_token]'
        ],
        'shop_goods_update' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/update?access_token=[access_token]'
        ],
        'shop_goods_get' => [
            'request_way' => 'GET',
            'request_uri' => '/merchant/get?access_token=[access_token]'
        ],
        'shop_goods_getbystatus' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/getbystatus?access_token=[access_token]'
        ],
        'shop_goods_modproductstatus' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/modproductstatus?access_token=[access_token]'
        ],
        'shop_category_getsub' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/category/getsub?access_token=[access_token]'
        ],
        'shop_category_getsku' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/category/getsku?access_token=[access_token]'
        ],
        'shop_category_getproperty' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/category/getproperty?access_token=[access_token]'
        ],
        'shop_stock_add' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/stock/add?access_token=[access_token]'
        ],
        'shop_stock_reduce' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/stock/reduce?access_token=[access_token]'
        ],
        'shop_express_add' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/express/add?access_token=[access_token]'
        ],
        'shop_express_del' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/express/del?access_token=[access_token]'
        ],
        'shop_express_update' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/express/update?access_token=[access_token]'
        ],
        'shop_express_getbyid' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/express/getbyid?access_token=[access_token]'
        ],
        'shop_express_getall' => [
            'request_way' => 'GET',
            'request_uri' => '/merchant/express/getall?access_token=[access_token]'
        ],
        'shop_group_add' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/group/add?access_token=[access_token]'
        ],
        'shop_group_del' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/group/del?access_token=[access_token]'
        ],
        'shop_group_propertymod' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/group/propertymod?access_token=[access_token]'
        ],
        'shop_group_productmod' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/group/productmod?access_token=[access_token]'
        ],
        'shop_group_getall' => [
            'request_way' => 'GET',
            'request_uri' => '/merchant/group/getall?access_token=[access_token]'
        ],
        'shop_group_getbyid' => [
            'request_way' => 'POST',
            'request_uri' => '/merchant/group/getbyid?access_token=[access_token]'
        ],
    ];

    /**
     * 请求方法列表（开放平台手机端模式）
     * @var array
     */
    protected static $openMobileMethodList = [
        'get_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/access_token?appid=[appid]&secret=[secret]&code=[code]&grant_type=authorization_code'
        ],
        'refresh_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/refresh_token?appid=[appid]&grant_type=refresh_token&refresh_token=[refresh_token]'
        ],
        'check_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/auth?access_token=[access_token]&openid=[openid]'
        ],
        'get_user_info' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/userinfo?access_token=[access_token]&openid=[openid]'
        ],
        'get_sdk_ticket' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/ticket/getticket?access_token=[access_token]&type=2'
        ],
        'subscribe' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/template/subscribe?access_token=[access_token]'
        ],
    ];

    /**
     * 请求方法列表（开放平台第三方平台模式）
     * @var array
     */
    protected static $openPlatformMethodList = [
        /*获取component_token*/
        'get_component_token' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_component_token'
        ],

        /*获取preAuthCode*/
        'get_preauthcode' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_create_preauthcode?component_access_token=[component_access_token]'
        ],

        /*获取pc端授权URL*/
        'get_auth_pc_url' => [
            'request_way' => 'GET',
            'request_uri' => 'https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=[component_appid]&pre_auth_code=[pre_auth_code]&redirect_uri=[redirect_uri]&auth_type=[auth_type]'
        ],

        /*获取手机端授权URL*/
        'get_auth_mobile_url' => [
            'request_way' => 'GET',
            'request_uri' => 'https://mp.weixin.qq.com/safe/bindcomponent?action=bindcomponent&auth_type=3&no_scan=1&component_appid=[component_appid]&pre_auth_code=[pre_auth_code]&redirect_uri=[redirect_uri]&auth_type=[auth_type]#wechat_redirect'
        ],

        /*获取授权信息*/
        'get_query_auth' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_query_auth?component_access_token=[component_access_token]'
        ],

        /*获取/刷新接口调用令牌*/
        'refresh_authorizer_token' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_authorizer_token?component_access_token=[component_access_token]'
        ],

        /*获取授权方的帐号基本信息*/
        'get_authorizer_info' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_get_authorizer_info?component_access_token=[component_access_token]'
        ],

        /*获取授权方选项信息*/
        'get_authorizer_option' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_get_authorizer_option?component_access_token=[component_access_token]'
        ],

        /*设置授权方选项信息*/
        'set_authorizer_option' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_set_authorizer_option?component_access_token=[component_access_token]'
        ],

        /*拉取所有已授权的帐号信息*/
        'get_authorizer_list' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/component/api_get_authorizer_list?component_access_token=[component_access_token]'
        ],

        /*创建开放平台帐号并绑定公众号/小程序*/
        'create_open_account' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/open/create?access_token=[access_token]'
        ],

        /*绑定开放平台帐号并绑定公众号/小程序*/
        'bind_open_account' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/open/bind?access_token=[access_token]'
        ],

        /*解绑开放平台帐号并绑定公众号/小程序*/
        'unbind_open_account' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/open/unbind?access_token=[access_token]'
        ],

        /*获取开放平台帐号并绑定公众号/小程序*/
        'get_open_account' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/open/get?access_token=[access_token]'
        ],

        /*公众号网页授权*/
        'account_web_auth' => [
            'request_way' => 'GET',
            'request_uri' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=[appid]&redirect_uri=[redirect_uri]&response_type=code&scope=[scope]&state=[state]&component_appid=[component_appid]#wechat_redirect'
        ],

        /*获取网页授权access_token*/
        'get_web_auth_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/component/access_token?appid=[appid]&code=[code]&grant_type=authorization_code&component_appid=[component_appid]&component_access_token=[component_access_token]'
        ],

        /*获取授权用户信息*/
        'get_user_info' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/userinfo?access_token=[access_token]&openid=[openid]&lang=zh_CN'
        ],

        /*获取用户基本信息*/
        'get_user_base_info' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/user/info?access_token=[access_token]&openid=[openid]&lang=zh_CN'
        ],

        /*生成参数二维码*/
        'qrcode_create' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/qrcode/create?access_token=[access_token]'
        ],

        /*生成参数二维码*/
        'send_template' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/message/template/send?access_token=[access_token]'
        ],
    ];

    /**
     * 请求方法列表（开放平台网站模式）
     * @var array
     */
    protected static $openWebsiteMethodList = [
        'login' => [
            'request_way' => 'GET',
            'request_uri' => 'https://open.weixin.qq.com/connect/qrconnect?appid=[appid]&redirect_uri=[redirect_uri]&response_type=code&scope=snsapi_login&state=[state]#wechat_redirect'
        ],
        'get_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/access_token?appid=[appid]&secret=[secret]&code=[code]&grant_type=authorization_code'
        ],
        'refresh_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/oauth2/refresh_token?appid=[appid]&grant_type=refresh_token&refresh_token=[refresh_token]'
        ],
        'check_access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/auth?access_token=[access_token]&openid=[openid]'
        ],
        'get_user_info' => [
            'request_way' => 'GET',
            'request_uri' => '/sns/userinfo?access_token=[access_token]&openid=[openid]'
        ]
    ];

    /**
     * 授权可调用的支付方法
     * @var array
     */
    protected static $payMethodList = [
        /*扫码支付*/
        'micro_pay' => [
            'request_way' => 'POST',
            'request_uri' => '/pay/micropay',
            'is_need_cert' => false,
        ],

        /*统一下单接口*/
        'unified_order' => [
            'request_way' => 'POST',
            'request_uri' => '/pay/unifiedorder',
            'is_need_cert' => false,
        ],

        /*查询订单*/
        'order_query' => [
            'request_way' => 'POST',
            'request_uri' => '/pay/orderquery',
            'is_need_cert' => false,
        ],

        /*关闭订单*/
        'close_order' => [
            'request_way' => 'POST',
            'request_uri' => '/pay/closeorder',
            'is_need_cert' => false,
        ],

        /*企业付款*/
        'transfers' => [
            'request_way' => 'POST',
            'request_uri' => '/mmpaymkttransfers/promotion/transfers',
            'is_need_cert' => true,
        ]
    ];

    protected static $corporationMethodList = [
        /*获取access_token*/
        'access_token' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/gettoken?corpid=[corpid]&corpsecret=[corpsecret]'
        ],

        /*获取ip地址段*/
        'get_api_domain_ip' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/get_api_domain_ip?access_token=[access_token]'
        ],

        /*成员创建*/
        'member_create' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/user/create?access_token=[access_token]'
        ],

        /*成员读取*/
        'member_get' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/user/get?access_token=[access_token]&userid=[userid]'
        ],

        /*成员更新*/
        'member_update' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/user/update?access_token=[access_token]'
        ],

        /*成员删除*/
        'member_delete' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/user/delete?access_token=[access_token]&userid=[userid]'
        ],

        /*批量删除*/
        'member_batch_delete' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/user/batchdelete?access_token=[access_token]'
        ],

        /*获取部门成员*/
        'department_member_get' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/user/simplelist?access_token=[access_token]&department_id=[department_id]&fetch_child=[fetch_child]'
        ],

        /*获取部门成员*/
        'department_member_detail' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/user/list?access_token=[access_token]&department_id=[department_id]&fetch_child=[fetch_child]'
        ],

        /*userid与openid互换*/
        'convert_to_openid' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/user/convert_to_openid?access_token=[access_token]'
        ],

        /*二次验证*/
        'authsucc' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/user/authsucc?access_token=[access_token]&userid=[userid]'
        ],

        /*邀请成员*/
        'invite' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/batch/invite?access_token=[access_token]'
        ],

        /*获取邀请二维码*/
        'get_join_qrcode' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/corp/get_join_qrcode?access_token=[access_token]&size_type=[size_type]'
        ],

        /*获取企业活跃成员数*/
        'get_active_stat' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/user/get_active_stat?access_token=[access_token]'
        ],

        /*部门创建*/
        'department_create' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/department/create?access_token=[access_token]'
        ],

        /*部门创建*/
        'department_update' => [
            'request_way' => 'POST',
            'request_uri' => '/cgi-bin/department/update?access_token=[access_token]'
        ],

        /*部门删除*/
        'department_delete' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/department/delete?access_token=[access_token]&id=[id]'
        ],

        /*部门列表*/
        'department_list' => [
            'request_way' => 'GET',
            'request_uri' => '/cgi-bin/department/list?access_token=[access_token]&id=[id]'
        ],
    ];
}