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
define('FAIL_TO_SEND_MAIL', 7);
define('ALREADY_SEND_EMAIL', 8);

define('BASE_PATH', 'http://121.42.165.222');

define('FPETABLE', 'form_person');
define('FPRTABLE', 'form_project');
define('PPTABLE', 'person_project');

define('FORM_LIMIT', 10);

define('TOKEN', '6bfcfbd320097d65d72d71e7854b0a23');
define('APPKEY', 'wx809c63746bcf1d76');
define('APPID', 'wx809c63746bcf1d76');
define('APPSECRET', '6b43fca63feac04649542fae733782de');
define('EMAIL_ACCOUNT', 'chuangyehongniang@163.com');
define('EMAIL_PASSWORD', 'cyhn2016');
define('MAIL_ACCOUNT', '创业红娘公益服务中心');
define('MAIL_SUBJECT', '［创业红娘］您的项目通过初步筛选，请于本月10号前提交“项目信息登记表”');
define('MAIL_MESSAGE','尊敬的创业者：'.
    '<br>'.
    '&nbsp&nbsp您好！您的项目已通过“创业红娘”的初步筛选，可以参加本月的“创业相亲会”。请您下载附件，填写好”创业红娘项目信息登记表”，并以项目名字命名，在10号前将报名表寄到刘玉老师的邮箱：liuyu@hust.edu.cn ！ （注意：我们将在15号统一将所有项目寄送投资人，如果您未能及时交表，视为自动放弃参会资格）'.
    '<br>'.
   '&nbsp&nbsp附件2为“创业者参会指南”，请您下载后仔细阅读。'.
    '<br>'.
    '［请勿回复本邮件］');


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
                    "type": "click",
                    "key": "BMXZ"
                },
                {
                    "name": "立即报名",
                    "type": "view",
                    "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx809c63746bcf1d76&redirect_uri=http://cyhn.aliapp.com/form/&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
                }
            ]
        },
        {
            "name": "关于我们",
            "sub_button": [
                {
                    "name": "创业红娘",
                    "type": "click",
                    "key": "CYHN"
                },
                {
                    "name": "平台简介",
                    "type": "click",
                    "key": "PTJJ"
                },
                {
                    "name": "投资阵容",
                    "type": "click",
                    "key": "TZZR"
                }
            ]
        }
    ]
}');


