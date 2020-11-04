<?php
namespace panthsoni\tengxun\common;


class CommonTemplate
{
    public static $template = [
        'text' => "<xml> 
                    <ToUserName><![CDATA[%s]]></ToUserName> 
                    <FromUserName><![CDATA[%s]]></FromUserName> 
                    <CreateTime>%s</CreateTime> 
                    <MsgType><![CDATA[text]]></MsgType> 
                    <Content><![CDATA[%s]]></Content> 
               </xml>",
        'image' => "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[image]]></MsgType>
                    <Image>
                        <MediaId><![CDATA[%s]]></MediaId>
                    </Image>
                </xml>",
        'voice' => "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[voice]]></MsgType>
                    <Voice>
                        <MediaId><![CDATA[%s]]></MediaId>
                    </Voice>
                </xml>",
        'video' => "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[video]]></MsgType>
                    <Video>
                        <MediaId><![CDATA[%s]]></MediaId>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                    </Video> 
                </xml>",
        'music' => "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[music]]></MsgType>
                    <Music>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                        <MusicUrl><![CDATA[%s]]></MusicUrl>
                        <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                        <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                    </Music>
                </xml>",
        'news' => [
            'main' => "<xml>
                       <ToUserName><![CDATA[%s]]></ToUserName>
                       <FromUserName><![CDATA[%s]]></FromUserName>
                       <CreateTime>%s</CreateTime>
                       <MsgType><![CDATA[news]]></MsgType>
                       <ArticleCount>%s</ArticleCount>
                       <Articles>%s</Articles>
                   </xml>",
            'item' => "<item>
                        <Title><![CDATA[%s]]></Title> 
                        <Description><![CDATA[%s]]></Description>
                        <PicUrl><![CDATA[%s]]></PicUrl>
                        <Url><![CDATA[%s]]></Url>
                    </item>"
        ],
        'transfer_customer_service' => [
            'main' => "<xml> 
                          <ToUserName><![CDATA[%s]]></ToUserName>  
                          <FromUserName><![CDATA[%s]]></FromUserName>  
                          <CreateTime>%s</CreateTime>  
                          <MsgType><![CDATA[transfer_customer_service]]></MsgType>",
            'item' => "<TransInfo> 
                        <KfAccount><![CDATA[%s]]></KfAccount> 
                      </TransInfo>"
        ]
    ];
}