<?php

/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016/3/22
 * Time: 14:03
 */
class test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        $output = '{
  "item": [
    {
      "media_id": "dR-78vCApRRIgmNF_9g_BB9OyKsAXIIE3OfwHGv2OwA",
      "content": {
        "news_item": [
          {
            "title": "测试消息2",
            "author": "",
            "digest": "2222",
            "content": "<p>2222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402369933&idx=1&sn=064f14394a8be054f32c3eaf42f238ec#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458626989
    },
    {
      "media_id": "dR-78vCApRRIgmNF_9g_BNt7XIAovG-Tis0edDlYSmo",
      "content": {
        "news_item": [
          {
            "title": "创业红娘微信公众平台测试",
            "author": "",
            "digest": "测试",
            "content": "<p>测试</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402363660&idx=1&sn=08b6774989e5b98e4dfa4206da08b014#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458565666
    }
  ],
  "total_count": 2,
  "item_count": 2
}';
        $jsonInfo = json_decode($output, true);
        print_r($jsonInfo['item']);
    }
}