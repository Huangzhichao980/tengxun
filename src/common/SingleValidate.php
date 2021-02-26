<?php


namespace panthsoni\tengxun\common;


class SingleValidate extends CommonValidate
{
    protected $rule = [
        'appid|appid' => 'length:0,50',
        'secret|secret' => 'length:0,50',
        'js_code|js_code'=>'length:0,50',
        'access_token|access_token' => 'length:0,255',
        'openid|openid'=>'length:0,50',
        'begin_date|begin_date'=>'dateFormat:Ymd',
        'end_date|begin_date'=>'dateFormat:Ymd',
        'touser|touser'=>'length:255',
        'msgtype|msgtype'=>'in:text,image,link,miniprogrampage',
        'text|text'=>'array',
        'image|image'=>'array',
        'link|link'=>'array',
        'miniprogrampage|miniprogrampage'=>'array',
        'command|command'=>'in:Typing,CancelTyping',
        'type|type'=>'in:image',
        'mp_template_msg|mp_template_msg'=>'array',
        'timestamp|timestamp'=>'length:0,100',
        'nonce|nonce'=>'length:0,100',
        'echostr|echostr'=>'length:0,100',
        'token|token'=>'length:0,100',
        'encoding_aes_key|encoding_aes_key'=>'length:0,100',
        'msg_signature|msg_signature'=>'length:0,100',
        'corpid|corpid'=>'length:0,50',
        'corpsecret|corpsecret'=>'length:0,50',
        'msg_type|msg_type'=>'in:text,voice,video,music,news,image,transfer_customer_service',
        'to_user_name|to_user_name'=>'length:0,50',
        'from_user_name|from_user_name'=>'length:0,50',
        'content|content'=>'length:0,255',
        'media_id|media_id'=>'length:0,50',
        'title|title'=>'length:0,50',
        'description|description'=>'length:0,255',
        'music_url|music_url'=>'length:0,255',
        'hq_music_url|hq_music_url'=>'length:0,255',
        'article_counts|article_counts'=>'between:1,8',
        'pic_url|pic_url'=>'length:0,255',
        'url|url'=>'length:0,255',
        'article_content|article_content'=>'array',
        'expire_seconds|expire_seconds'=>'number',
        'action_info|action_info'=>'array',
        'id|ID'=>'number',
        'name|name'=>'length:0,32',
        'name_en|name_en'=>'length:0,32',
        'parentid|parentid'=>'number',
        'order|order'=>'number',
        'button|button' => 'length:0,100',
        'industry_id1|industry_id1' => 'number',
        'industry_id2|industry_id2' => 'number',
        'template_id_short|template_id_short' => 'length:0,50',
        'template_id|template_id' => 'length:0,50',
        'template_message_content|template_message_content' => 'length:0,255',
        'account_message_content|account_message_content' => 'length:0,255',
        'menuid|menuid'=>'length:0,20',
        'kf_account|kf_account'=>'length:0,50',
        'nickname|nickname'=>'length:0,20',
        'password|password'=>'length:0,30',
        'redirect_uri|redirect_uri'=>'length:0,255',
        'scope|scope'=>'in:snsapi_base,snsapi_userinfo',
        'lang|lang'=>'length:0,10',
        'tag|tag'=>'length:0,20',
        'tagid|tagid'=>'number',
        'next_openid|next_openid'=>'length:0,50',
        'is_safe|is_safe'=>'length:0,5',
        'signature|signature'=>'length:0,100',
        'action|action'=>'in:long2short',
        'long_url|long_url'=>'length:0,255',
        'scene|scene' => 'length:0,50',
        'data|data' => 'length:0,255',
        'mch_id|mch_id' => 'length:0,32',
        'device_info|device_info' => 'length:0,32',
        'nonce_str|nonce_str' => 'length:0,32',
        'sign|sign' => 'length:0,32',
        'sign_type|sign_type' => 'length:0,32',
        'body|body' => 'length:0,128',
        'detail|detail' => 'length:0,6000',
        'attach|attach' => 'length:0,127',
        'out_trade_no|out_trade_no' => 'length:0,32',
        'total_fee|total_fee' => 'number',
        'fee_type|fee_type' => 'length:0,16',
        'spbill_create_ip|spbill_create_ip' => 'length:0,64',
        'goods_tag|goods_tag' => 'length:0,32',
        'limit_pay|limit_pay' => 'length:0,32',
        'time_start|time_start' => 'length:0,14',
        'time_expire|time_expire' => 'length:0,14',
        'receipt|receipt' => 'length:0,8',
        'auth_code|auth_code' => 'length:0,128',
        'scene_info|scene_info' => 'array',
        'notify_url|notify_url' => 'length:0,255',
        'trade_type|trade_type' => 'length:0,16',
        'product_id|product_id' => 'length:0,32',
        'transaction_id|transaction_id' => 'length:0,32',
        'mch_appid|mch_appid' => 'length:0,50',
        'mchid|mchid' => 'length:0,32',
        'partner_trade_no|partner_trade_no' => 'length:0,32',
        'check_name|check_name' => 'in:NO_CHECK,FORCE_CHECK',
        'desc|desc' => 'length:0,100',
        'amount|amount' => 'number',
        're_user_name|re_user_name' => 'length:0,50',
        'encrypt_type|encrypt_type'=>'length:0,20',
        'component_appid|component_appid'=>'length:0,20',
        'component_appsecret|component_appsecret'=>'length:0,100',
        'component_verify_ticket|component_verify_ticket'=>'length:0,100',
        'component_access_token|component_access_token'=>'length:0,255',
        'pre_auth_code|pre_auth_code'=>'length:0,255',
        'auth_type|auth_type'=>'in:1,2,3',
        'authorization_code|authorization_code'=>'length:0,255',
        'authorizer_appid|authorizer_appid'=>'length:0,20',
        'authorizer_refresh_token|authorizer_refresh_token'=>'length:0,255',
        'option_name|option_name'=>'length:0,50',
        'option_value|option_value'=>'length:0,50',
        'offset|offset'=>'number',
        'count|count'=>'number',
        'state|state'=>'length:0,128',
        'code|code'=>'length:0,128',
        'action_name|action_name'=>'in:QR_SCENE,QR_STR_SCENE,QR_LIMIT_SCENE,QR_LIMIT_STR_SCENE',
        'refresh_token|refresh_token' => 'length:0,100',
    ];

    public $scene = [
        'get_access_token' => [
            'appid'=>'require|length:0,50',
            'secret'=>'require|length:0,50'
        ],
        'set_typing' => [
            'access_token'=>'require|length:0,255',
            'touser'=>'require|length:255',
            'command'=>'require|in:Typing,CancelTyping',
        ],
        'send_message' => [
            'access_token'=>'require|length:0,255',
            'touser'=>'require|length:255',
            'msgtype'=>'require|in:text,image,link,miniprogrampage',
            'text','image','link','miniprogrampage'
        ],
        'applet_login' => [
            'appid'=>'require|length:0,50',
            'secret'=>'require|length:0,50',
            'js_code'=>'require|length:0,50'
        ],
        'applet_get_user_info' => [
            'access_token'=>'require|length:0,255',
            'openid'=>'require|length:0,50'
        ],
        'applet_get_daily_retain' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_monthly_retain' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_weekly_retain' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_daily_summary' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_daily_visit_trend' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_weekly_visit_trend' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_monthly_visit_trend' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_user_portrait' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_visit_distribution' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_visit_page' => [
            'access_token'=>'require|length:0,255',
            'begin_date'=>'require|dateFormat:Ymd',
            'end_date'=>'require|dateFormat:Ymd',
        ],
        'applet_get_temp_media' => [
            'access_token'=>'require|length:0,255',
            'media_id'=>'require|length:255',
        ],
        'applet_upload_temp_media' => [
            'access_token'=>'require|length:0,255',
            'media_id'=>'require|length:255',
            'type'=>'require|in:image'
        ],
        'applet_uniform_send' => [
            'access_token'=>'require|length:0,255',
            'touser'=>'require|length:255',
            'mp_template_msg'=>'require|array',
        ],
        'applet_create_activity_id' => [],
        'applet_set_update_table_msg' => [],
        'applet_apply_plugin' => [],
        'applet_get_plugin_dev_apply_list' => [],
        'applet_get_plugin_list' => [],
        'applet_set_dev_plugin_apply_status' => [],
        'applet_unbind_plugin' => [],
        'applet_add_near_applet' => [],
        'applet_delete_near_applet' => [],
        'applet_get_near_applet_list' => [],
        'applet_set_show_status' => [],
        'applet_create_qr_code' => [],
        'applet_get_qr_code' => [],
        'applet_get_qr_code_unlimited' => [],
        'applet_img_sec_check' => [],
        'applet_media_check_async' => [],
        'applet_msg_sec_check' => [],
        'applet_add_user_action' => [],
        'applet_add_user_action_set' => [],
        'applet_get_user_action_set_reports' => [],
        'applet_get_user_action_sets' => [],
        'get_authorize_access_token'=>[
            'appid'=>'require|length:0,20',
            'secret'=>'require|length:0,50',
            'code'=>'require|length:0,50'
        ],
        'check_auth'=>[
            'access_token'=>'require|length:0,255',
            'openid'=>'require|length:0,50'
        ],
        'refresh_authorize_access_token'=>[
            'appid'=>'require|length:0,20',
            'refresh_token'=>'require|length:0,100'
        ],
        'get_user_info'=>[
            'access_token'=>'require|length:0,255',
            'openid'=>'require|length:0,50',
            'lang'=>'require|length:0,10'
        ],
        'create_menu'=>[
            'access_token'=>'require|length:0,255',
            'button'=>'require|length:0,100'
        ],
        'get_menu'=>[
            'access_token'=>'require|length:0,255'
        ],
        'del_menu'=>[
            'access_token'=>'require|length:0,255'
        ],
        'create_self_menu'=>[
            'access_token'=>'require|length:0,255',
            'button'=>'require|length:0,100'
        ],
        'del_self_menu'=>[
            'access_token'=>'require|length:0,255',
            'menuid'=>'require|length:0,20'
        ],
        'get_self_menu'=>[
            'access_token'=>'require|length:0,255'
        ],
        'create_account'=>[
            'access_token'=>'require|length:0,255',
            'kf_account'=>'require|length:0,50',
            'nickname'=>'require|length:0,50',
            'password'=>'require|length:0,50'
        ],
        'update_account'=>[
            'access_token'=>'require|length:0,255',
            'kf_account'=>'require|length:0,50',
            'nickname'=>'require|length:0,50',
            'password'=>'require|length:0,50'
        ],
        'del_account'=>[
            'access_token'=>'require|length:0,255',
            'kf_account'=>'require|length:0,50',
            'nickname'=>'require|length:0,50',
            'password'=>'require|length:0,50'
        ],
        'upload_account'=>[
            'access_token'=>'require|length:0,255',
            'kf_account'=>'require|length:0,50'
        ],
        'get_account'=>[
            'access_token'=>'require|length:0,255'
        ],
        'set_industry'=>[
            'access_token'=>'require|length:0,255',
            'industry_id1'=>'require|number',
            'industry_id2'=>'require|number'
        ],
        'get_industry'=>[
            'access_token'=>'require|length:0,255'
        ],
        'add_template'=>[
            'access_token'=>'require|length:0,255',
            'template_id_short'=>'require|length:0,50'
        ],
        'get_template'=>[
            'access_token'=>'require|length:0,255'
        ],
        'del_template'=>[
            'access_token'=>'require|length:0,255',
            'template_id'=>'require|length:0,50'
        ],
        'send_template_message'=>[
            'access_token'=>'require|length:0,255',
            'template_message_content'=>'require|length:0,255'
        ],
        'user_authorize'=>[
            'appid'=>'require|length:0,20',
            'redirect_uri'=>'require|length:0,255',
            'scope'=>'require|in:snsapi_base,snsapi_userinfo',
            'state'=>'length:0,128'
        ],
        'create_tag'=>[
            'access_token'=>'require|length:0,255',
            'tag'=>'require|length:0,20'
        ],
        'update_tag'=>[
            'access_token'=>'require|length:0,255',
            'tag'=>'require|length:0,20'
        ],
        'del_tag'=>[
            'access_token'=>'require|length:0,255',
            'tag'=>'require|length:0,20'
        ],
        'get_tag_openid'=>[
            'access_token'=>'require|length:0,255',
            'tagid'=>'require|number',
            'next_openid'=>'require|length:0,50'
        ],
        'qrcode_create'=>[
            'access_token'=>'require|length:0,255',
            'expire_seconds'=>'require|number',
            'action_name'=>'require|in:QR_SCENE,QR_STR_SCENE',
            'action_info'=>'require|array'
        ],
        'short_url'=>[
            'access_token'=>'require|length:0,255',
            'action'=>'require|in:long2short',
            'long_url'=>'require|length:0,255'
        ],
        'listen'=>[
            'signature'=>'require|length:0,100',
            'timestamp'=>'require|length:0,100',
            'nonce'=>'require|length:0,100',
            'token','echostr','appid','encoding_aes_key','msg_signature'
        ],
        'replyMessage'=>[
            'msg_type'=>'require|in:text,voice,video,music,news,image,transfer_customer_service',
            'to_user_name'=>'require|length:0,50',
            'from_user_name'=>'require|length:0,50',
            'token','appid','encoding_aes_key'
        ],
        'text'=>[
            'content'=>'require|length:0,255'
        ],
        'voice'=>[
            'media_id'=>'require|length:0,50'
        ],
        'video'=>[
            'media_id'=>'require|length:0,50',
            'title'=>'require|length:0,50',
            'description'=>'require|length:0,255'
        ],
        'music'=>[
            'media_id'=>'require|length:0,50',
            'title','description','music_url','hq_music_url'
        ],
        'image'=>[
            'media_id'=>'require|length:0,50'
        ],
        'news'=>[
            'article_counts'=>'require|between:1,8',
            'article_content'=>'require|array'
        ],
        'news_item'=>[
            'title'=>'require|length:0,50',
            'description'=>'require|length:0,50',
            'pic_url'=>'require|length:0,255',
            'url'=>'require|length:0,255'
        ],
        'transfer_customer_service'=>['kf_account'],
        'get_sdk_ticket' => [
            'access_token'=>'require|length:0,100'
        ],
        'subscribe' => [
            'touser'=>'require|length:0,32',
            'template_id'=>'require|length:0,50',
            'scene'=>'require|length:0,50',
            'title'=>'require|length:0,50',
            'data'=>'require|length:0,255',
            'url'
        ],
        'get_component_token' => [
            'component_appid'=>'require|length:0,20',
            'component_appsecret'=>'require|length:0,100',
            'component_verify_ticket'=>'require|length:0,100',
        ],
        'get_preauthcode' => [
            'component_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
        ],
        'get_auth_pc_url' => [
            'component_appid'=>'require|length:0,20',
            'pre_auth_code'=>'require|length:0,255',
            'redirect_uri'=>'require|length:0,255',
            'auth_type'=>'require|in:1,2,3',
        ],
        'get_auth_mobile_url' => [
            'component_appid'=>'require|length:0,20',
            'pre_auth_code'=>'require|length:0,255',
            'redirect_uri'=>'require|length:0,255',
            'auth_type'=>'require|in:1,2,3',
        ],
        'get_query_auth' => [
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'authorization_code'=>'require|length:0,255',
        ],
        'refresh_authorizer_token' => [
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'authorizer_appid'=>'require|length:0,20',
            'authorizer_refresh_token'=>'require|length:0,255',
        ],
        'get_authorizer_info' => [
            'authorizer_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
        ],
        'get_authorizer_option' => [
            'authorizer_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'option_name'=>'require|length:0,50',
        ],
        'set_authorizer_option' => [
            'authorizer_appid'=>'require|length:0,20',
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'option_name'=>'require|length:0,50',
            'option_value'=>'require|length:0,50',
        ],
        'get_authorizer_list' => [
            'component_access_token'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
            'offset'=>'require|number',
            'count'=>'require|number',
        ],
        'create_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],
        'bind_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],
        'unbind_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],
        'get_open_account' => [
            'access_token' => 'require|length:0,255',
            'appid' => 'require|length:0,50',
        ],
        'account_web_auth' => [
            'component_appid'=>'require|length:0,20',
            'appid'=>'require|length:0,20',
            'scope'=>'require|in:snsapi_base,snsapi_userinfo',
            'redirect_uri'=>'require|length:0,255',
            'state'
        ],
        'get_web_auth_access_token' => [
            'component_appid'=>'require|length:0,20',
            'appid'=>'require|length:0,20',
            'code'=>'require|length:0,100',
            'component_access_token'=>'require|length:0,255',
        ],
        'get_user_base_info' => [
            'access_token' => 'require|length:0,255',
            'openid' => 'require|length:0,50',
        ],
        'listenPlatform' => [
            'timestamp'=>'require|length:0,255',
            'nonce'=>'require|length:0,255',
            'encrypt_type'=>'require|length:0,20',
            'msg_signature'=>'require|length:0,255',
            'signature'=>'require|length:0,255',
            'token'=>'require|length:0,255',
            'encoding_aes_key'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
        ],
        'listenAccount' => [
            'component_appid'=>'require|length:0,20',
            'token'=>'require|length:0,255',
            'encoding_aes_key'=>'require|length:0,255',
            'timestamp'=>'require|length:0,255',
            'nonce'=>'require|length:0,255',
            'encrypt_type'=>'require|length:0,20',
            'msg_signature'=>'require|length:0,255',
            'signature'=>'require|length:0,255',
        ],
        'replyPlatformMessage' => [
            'msg_type'=>'require|in:text,voice,video,music,news,image',
            'to_user_name'=>'require|length:0,50',
            'from_user_name'=>'require|length:0,50',
            'token'=>'require|length:0,255',
            'encoding_aes_key'=>'require|length:0,255',
            'component_appid'=>'require|length:0,20',
        ],
        'login' => [
            'appid'=>'require|length:0,50',
            'redirect_uri'=>'require|length:0,255',
            'state'=>'require|length:0,128'
        ],
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
        ],
        'listenCorporation'=>[
            'msg_signature'=>'require|length:0,100',
            'timestamp'=>'require|length:0,100',
            'nonce'=>'require|length:0,100',
            'appid'=>'require|length:0,50',
            'token'=>'require|length:0,50',
            'encoding_aes_key'=>'require|length:0,128',
            'echostr',
        ],
        'access_token'=>[
            'corpid'=>'require|length:0,50',
            'corpsecret'=>'require|length:0,50'
        ],
        'get_api_domain_ip'=>[
            'access_token' => 'require|length:0,255'
        ],
        'member_create'=>[

        ],
        'member_get'=>[

        ],
        'member_update'=>[

        ],
        'member_delete'=>[

        ],
        'member_batch_delete'=>[

        ],
        'department_member_get'=>[

        ],
        'department_member_detail'=>[

        ],
        'convert_to_openid'=>[

        ],
        'authsucc'=>[

        ],
        'invite'=>[

        ],
        'get_join_qrcode'=>[

        ],
        'get_active_stat'=>[

        ],
        'department_create'=>[
            'access_token' => 'require|length:0,255',
            'parentid' => 'require|number',
            'name' => 'require|length:0,32',
            'name_en','parentid','order'
        ],
        'department_update'=>[
            'access_token' => 'require|length:0,255',
            'id' => 'require|number',
            'name','name_en','parentid','order'
        ],
        'department_delete'=>[
            'access_token' => 'require|length:0,255',
            'id' => 'require|number',
        ],
        'department_list'=>[
            'access_token' => 'require|length:0,255',
            'id'
        ]
    ];
}