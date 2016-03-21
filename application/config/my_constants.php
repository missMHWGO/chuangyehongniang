<?php
/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-14
 * Time: 13:21
 */
$config = array();

define('TOKEN', '6bfcfbd320097d65d72d71e7854b0a23');
define('APPKEY', 'wx809c63746bcf1d76');
define('APPSECRET', '6b43fca63feac04649542fae733782de');










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
          "type": "click",
          "key": "LJBM"
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


