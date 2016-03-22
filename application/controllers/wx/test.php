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
      "media_id": "dR-78vCApRRIgmNF_9g_BPZEaUf-TK2E7Crc_GbkoXI",
      "content": {
        "news_item": [
          {
            "title": "测试用例3",
            "author": "",
            "digest": "",
            "content": "<p>222222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402369992&idx=1&sn=d8c085a9957502fa5f9401af345dd319#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          },
          {
            "title": "测试用例3-1",
            "author": "",
            "digest": "",
            "content": "<p>23232</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BF_p2Nqkjy2rvg7WfzkPuQo",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402369992&idx=2&sn=585ff5e45d888f91b56b7477bc8b8a6d#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaIHq5liczBFdhFjBiaI2XNv9eYhzdGIviamI2eSqtnnqszHAQcPcJNIsI6gFT3g49X3HhdZ7kfetjVHQ/0?wx_fmt=jpeg"
          },
          {
            "title": "测试用例3-2",
            "author": "",
            "digest": "",
            "content": "",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402369992&idx=3&sn=2688c9b5947ff718bddfd5457894858f#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458627286
    }
  ],
  "total_count": 3,
  "item_count": 1
}';
        $jsonInfo = json_decode($output, true);
        $newsList = $jsonInfo['item'][0]['content']['news_item'];
        $content = array();
        foreach($newsList as $key){
            $content[] = array("Title"=>$key['title'], "Description"=>$key['digest'], "PicUrl"=>$key['thumb_url'], "Url" =>$key['url']);
        }
        print_r($content);
    }
}