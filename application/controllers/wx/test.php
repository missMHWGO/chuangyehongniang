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
      "media_id": "4eNky6EyuGQlIpE3mdrotwcHz0lc0SNkpzXzUgNHPYw",
      "content": {
        "news_item": [
          {
            "title": "这是一个干扰消息",
            "author": "",
            "digest": "222",
            "content": "<p>222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402371000&idx=1&sn=858fcb33c515d7c8ebc2d747ce565e5f#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458630245
    },
    {
      "media_id": "4eNky6EyuGQlIpE3mdrot-arFOaWoZ6ZFIJX9HVE_1U",
      "content": {
        "news_item": [
          {
            "title": "[项目4]x",
            "author": "",
            "digest": "222",
            "content": "<p>222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370985&idx=1&sn=c2c6f13b58cc941728961727bae5a30e#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458630201
    },
    {
      "media_id": "4eNky6EyuGQlIpE3mdrot4NHi5SAa32MmnJnzsEbtqE",
      "content": {
        "news_item": [
          {
            "title": "海报",
            "author": "",
            "digest": "22222",
            "content": "<p>22222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370980&idx=1&sn=030b5cdd491f209085695c9dc3a98f77#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458630176
    },
    {
      "media_id": "4eNky6EyuGQlIpE3mdrot2A2fB7OjO43EI7PQQc-gOk",
      "content": {
        "news_item": [
          {
            "title": "[项目1]成功案例",
            "author": "",
            "digest": "",
            "content": "<p>2222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370953&idx=1&sn=5e627bdabf0704711e3bd19f103090d1#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          },
          {
            "title": "[项目2]xxxxx",
            "author": "",
            "digest": "",
            "content": "<p>222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BF_p2Nqkjy2rvg7WfzkPuQo",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370953&idx=2&sn=1374030e1d058eef75db911f66ebee28#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaIHq5liczBFdhFjBiaI2XNv9eYhzdGIviamI2eSqtnnqszHAQcPcJNIsI6gFT3g49X3HhdZ7kfetjVHQ/0?wx_fmt=jpeg"
          },
          {
            "title": "[项目3]xxxxxxxx",
            "author": "",
            "digest": "",
            "content": "<p>2222</p>",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BF_p2Nqkjy2rvg7WfzkPuQo",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370953&idx=3&sn=5f0ab87794ddf5b9301bfbf80f7246e8#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaIHq5liczBFdhFjBiaI2XNv9eYhzdGIviamI2eSqtnnqszHAQcPcJNIsI6gFT3g49X3HhdZ7kfetjVHQ/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458630156
    },
    {
      "media_id": "4eNky6EyuGQlIpE3mdrotynzwJv6VwiAD5iaFg-PqKU",
      "content": {
        "news_item": [
          {
            "title": "某一期创业红娘汇总",
            "author": "",
            "digest": "",
            "content": "",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370738&idx=1&sn=97ea1e6a1bcef81ab67aad8cdf69558d#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          },
          {
            "title": "该期相关内容",
            "author": "",
            "digest": "",
            "content": "",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370738&idx=2&sn=d273419edda7b2ce7743cac8fc20a092#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          },
          {
            "title": "改期相关内容",
            "author": "",
            "digest": "",
            "content": "",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370738&idx=3&sn=f339e51c265a71eabe4e00103c7b0ab2#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          },
          {
            "title": "改期相关内容",
            "author": "",
            "digest": "",
            "content": "",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370738&idx=4&sn=97c6647dc75d30dec72d0eb64199f9cb#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          },
          {
            "title": "改期相关内容",
            "author": "",
            "digest": "",
            "content": "",
            "content_source_url": "",
            "thumb_media_id": "dR-78vCApRRIgmNF_9g_BNsPlyI24QB4wtBeZhGV9D4",
            "show_cover_pic": 0,
            "url": "http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402370738&idx=5&sn=a8bc11e352f84410ebc01f5f917daa50#rd",
            "thumb_url": "http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaJuNPNMbwXWBFic6icr8NVSJdtHq3iaaDu9SAicE2Ifv48gLDmogtsfQZvtDHxHR0x8iay4l9FUriaCY3hg/0?wx_fmt=jpeg"
          }
        ]
      },
      "update_time": 1458629284
    },
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
    },
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
  "total_count": 8,
  "item_count": 8
}';
        preg_match_all('/\"title\": \"\[.*\].*\",(.|\n)*?\"thumb_url\": \".*\"/', $output, $res);
        $content = array();
        foreach($res[0] as $key){
            $key = json_decode("{".$key."}", true);
            $content[] = array("Title"=>$key['title'], "Description"=>$key['digest'], "PicUrl"=>$key['thumb_url'], "Url" =>$key['url']);
            print_r($key);
        }
        print_r($content);
    }
}