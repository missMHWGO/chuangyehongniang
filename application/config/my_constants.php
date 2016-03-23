<?php
/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-14
 * Time: 13:21
 */
$config = array();

define('SUCCESS', 1);
define('FAIL', 0);
define('NO_INPUT', 2);
define('FAIL_TO_INSERT', 3);
define('FAIL_TO_DELETE', 4);
define('FAIL_TO_UPDATE', 5);
define('INVALID_INPUT', 6);

define('BASE_PATH', 'http://121.42.165.222');

define('FPETABLE', 'form_person');
define('FPRTABLE', 'form_project');
define('PPTABLE', 'person_project');

define('FORM_LIMIT', 10);

define('TOKEN', '6bfcfbd320097d65d72d71e7854b0a23');
define('APPKEY', 'wx809c63746bcf1d76');
define('APPID', 'wx809c63746bcf1d76');
define('APPSECRET', '6b43fca63feac04649542fae733782de');


//define('TEXT_XML', "<xml>".
//    "<ToUserName><![CDATA[%s]]></ToUserName>".
//    "<FromUserName><![CDATA[%s]]></FromUserName>".
//    "<CreateTime>%s</CreateTime>".
//    "<MsgType><![CDATA[text]]></MsgType>".
//    "<Content><![CDATA[%s]]></Content>".
//    "<FuncFlag>%d</FuncFlag>".
//    "</xml>");
//define('ITEM_XML', "<item>".
//    "<Title><![CDATA[%s]]></Title>".
//    "<Description><![CDATA[%s]]></Description>".
//    "<PicUrl><![CDATA[%s]]></PicUrl>".
//    "<Url><![CDATA[%s]]></Url>".
//    "</item>");







define('menu', '{
    "button": [
        {
            "name": "成功案例",
            "type": "click",
            "key": "CGAL"
        },
        {
            "name": "我要报名",
            "sub_button": [
                {
                    "name": "报名须知",
                    "type": "view",
                    "url": "http://121.42.165.222/form/helper"
                },
                {
                    "name": "立即报名",
                    "type": "view",
                    "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx809c63746bcf1d76&redirect_uri=http://www.baidu.com&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
                }
            ]
        },
        {
            "name": "关于我们",
            "sub_button": [
                {
                    "name": "创业红娘",
                    "type": "view",
                    "url": "http://121.42.165.222/about/cyhn"
                },
                {
                    "name": "平台简介",
                    "type": "view",
                    "url": "http://121.42.165.222/about/ptjj"
                },
                {
                    "name": "投资阵容",
                    "type": "view",
                    "url": "http://121.42.165.222/about/tzzr"
                }
            ]
        }
    ]
}');


