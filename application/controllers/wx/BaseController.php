<?php

/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-14
 * Time: 13:37
 */
class BaseController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function judge()
    {
        if (isset($_GET['echostr'])) {
            $this->valid();
        } else {
            $this->responseMsg();
        }
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if ($this->checkSignature()) {
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);

            switch ($RX_TYPE)
            {
                case "text":
                    $resultStr = $this->receiveText($postObj);
                    break;
                case "event":
                    $resultStr = $this->receiveEvent($postObj);
                    break;
                default:
                    $resultStr = "";
                    break;
            }
            echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }

    private function receiveText($object)
    {
        $funcFlag = 0;
        $contentStr = "你的留言已收到";
        $resultStr = $this->transmitText($object, $contentStr, $funcFlag);
        return $resultStr;
    }

    private function receiveEvent($object)
    {
        $contentStr = "";
        switch ($object->Event) {
            case "subscribe":
                $contentStr = "你好，欢迎关注创业红娘！";
            case "unsubscribe":
                break;
            case "click":
                switch ($object->EventKey) {
                    case "CGAL":
                        $contentStr[] = array("Title" => "创业红娘2016年获融资项目汇总",
                            "Description" => "方倍工作室提供移动互联网相关的产品及服务",
                            "PicUrl" => "https://mp.weixin.qq.com/misc/getheadimg?fakeid=3016836145&token=1260130174&lang=zh_CN",
                            "Url" => "www.baidu.com");
                        break;
                    case "BMXZ":
                        $contentStr[] = array("Title" => "报名须知",
                            "Description" => "方倍工作室提供移动互联网相关的产品及服务",
                            "PicUrl" => "https://mp.weixin.qq.com/misc/getheadimg?fakeid=3016836145&token=1260130174&lang=zh_CN",
                            "Url" => "www.baidu.com");
                        break;
                    case "LJBM":
                        $contentStr[] = array("Title" => "报名须知",
                            "Description" => "方倍工作室提供移动互联网相关的产品及服务",
                            "PicUrl" => "https://mp.weixin.qq.com/misc/getheadimg?fakeid=3016836145&token=1260130174&lang=zh_CN",
                            "Url" => "www.baidu.com");
                        break;
                    case "CYHN":
                        $contentStr[] = array("Title" => "报名须知",
                            "Description" => "方倍工作室提供移动互联网相关的产品及服务",
                            "PicUrl" => "https://mp.weixin.qq.com/misc/getheadimg?fakeid=3016836145&token=1260130174&lang=zh_CN",
                            "Url" => "www.baidu.com");
                        break;
                    case "PTJJ":
                        $contentStr[] = array("Title" => "报名须知",
                            "Description" => "方倍工作室提供移动互联网相关的产品及服务",
                            "PicUrl" => "https://mp.weixin.qq.com/misc/getheadimg?fakeid=3016836145&token=1260130174&lang=zh_CN",
                            "Url" => "www.baidu.com");
                        break;
                    case "TZZR":
                        $contentStr[] = array("Title" => "报名须知",
                            "Description" => "方倍工作室提供移动互联网相关的产品及服务",
                            "PicUrl" => "https://mp.weixin.qq.com/misc/getheadimg?fakeid=3016836145&token=1260130174&lang=zh_CN",
                            "Url" => "www.baidu.com");
                        break;
                    default:
                        $contentStr[] = array("Title" => "默认菜单回复",
                            "Description" => "您正在使用的是方倍工作室的自定义菜单测试接口",
                            "PicUrl" => "http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
                            "Url" => "weixin://addfriend/pondbaystudio");
                        break;
                }
                break;
            default:
                break;

        }
        if (is_array($contentStr)) {
            $resultStr = $this->transmitNews($object, $contentStr);
        } else {
            $resultStr = $this->transmitText($object, $contentStr);
        }
        return $resultStr;
    }
}

?>
