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
        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);

            switch ($RX_TYPE) {
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
        } else {
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
            case "CLICK":  //一定要是大写！！！
                switch ($object->EventKey) {
                    case "CGAL":
                        $accessToken = $this->getAccessToken();
//                        $newsNum = $this->getNewsNum($accessToken);
                        $newsList = $this->getNewsList($accessToken);
                        preg_match_all('/\"title\": \"\[.*\].*\",(.|\n)*?\"thumb_url\": \".*\"/', $newsList, $res);
//                        $contentStr = array();
                        $key = $res[0][0];
//                        foreach($res as $key){
//                            $key = json_decode("{".$key."}", true);
//                            $contentStr[] = array("Title"=> $key['title'], "Description"=>$key['digest'], "PicUrl"=>$key['thumb_url'], "Url" =>$key['url']);
//                        }
                        $contentStr = "11111";

                        break;
                    default:
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


    private function transmitText($object, $content, $funcFlag = 0)
    {
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>%d</FuncFlag>
</xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }

    private function transmitNews($object, $arr_item, $funcFlag = 0)
    {
        //首条标题28字，其他标题39字
        if(!is_array($arr_item))
            return;

        $itemTpl = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>";
        $item_str = "";
        foreach ($arr_item as $item)
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);

        $newsTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <Content><![CDATA[]]></Content>
            <ArticleCount>%s</ArticleCount>
            <Articles>$item_str</Articles>
            <FuncFlag>%s</FuncFlag>
        </xml>";

        $resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);
        return $resultStr;
    }

    private function getAccessToken()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPKEY."&secret=".APPSECRET;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsonInfo = json_decode($output, true);
        return $jsonInfo["access_token"];
    }

//    private function getNewsNum($accessToken)
//    {
//        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$accessToken;
//        $data = '{"voice_count":COUNT,"video_count":COUNT,"image_count":COUNT,"news_count":COUNT}';
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt ( $ch, CURLOPT_POST, 1 );
//        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
//        $output = curl_exec($ch);
//        curl_close($ch);
//        $jsonInfo = json_decode($output, true);
//        return $jsonInfo["news_count"];
//    }

    private function getNewsList($accessToken)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$accessToken;
        $data = '{"type":"news","offset":0,"count":20}'; //最新发布的为0
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
?>