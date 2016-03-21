<?php
/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-14
 * Time: 13:21
 */
$config = array();

define('FPETABLE', 'form_person');
define('FPRTABLE', 'form_project');
define('PPTABLE', 'person_project');

define('FORM_LIMIT', 10);

define('TOKEN', '6bfcfbd320097d65d72d71e7854b0a23');
define('APPKEY', 'wx809c63746bcf1d76');
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
          "url":"http://www.baidu.com"
        },
        {
          "name": "立即报名",
          "type": "view",
          "url":"http://www.baidu.com"
        }
      ]
    },
    {
      "name": "关于我们",
      "sub_button": [
        {
          "name": "创业红娘",
          "type": "view",
          "url":"http://www.hao123.com/a/tianqi"
        },
        {
          "name": "平台简介",
          "type": "view",
          "url":"http://m.hao123.com/a/tianqi"
        },
        {
          "name": "投资阵容",
          "type": "view",
          "url":"http://m.hao123.com/a/tianqi"
        }
      ]
    }
  ]
}');


