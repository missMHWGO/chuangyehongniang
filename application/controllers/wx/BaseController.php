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
                    case "BMXZ":
                        $contentStr[] = array(
                            "Title"=> "“创业红娘 ”创业者须知及注意事项",
                            "Description"=>"以下为想参加“创业相亲会”获得融资的创业者须知事项，请创业者认真阅读。",
                            "PicUrl"=>"http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaKOlGmfZIBMK9M1zYIbWiazS0D6nMPnicVibL8UunMKZmDuNn369L02FNu7iaZ4xAsvV8ibIgUBossMkzA/0?wx_fmt=jpeg",
                            "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402552567&idx=1&sn=e3a8255688d1bf99d76d590d8662772f#rd"
                        );
                        break;
                    case "CYHN":
                        $contentStr[] = array(
                            "Title"=> "刘玉：从Dian团队创始人到“创业红娘”的华丽转型",
                            "Description"=>"刘玉教授，华中科技大学启明学院副院长，Dian团队创始人，“创业红娘”公益服务中心创始人",
                            "PicUrl"=>"https://mmbiz.qlogo.cn/mmbiz/OIzxibr3LSaLc8pNmmgALthOLVAxzVlSBnTWYbkn9iccjodfouvjfTeYejJEWzYCOWQIczlgX5hwDUCeBCEtAfUg/0?wx_fmt=jpeg",
                            "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402479086&idx=1&sn=1f297b387c2be6475816921c7d2c7764#rd");
                        break;
                    case "TSHD":
                        $contentStr[] = array(
                            "Title"=> "“创业红娘公益服务中心”每月特色活动\"",
                            "Description"=>"武汉市洪山区创业红娘公益服务中心是一个为创业者和投资人牵线搭桥，帮助创业项目融资、帮扶团队成长的公益性组织。",
                            "PicUrl"=>"http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaKOlGmfZIBMK9M1zYIbWiazSqsJqCyTQKHfC3SU1LzVpdElTvSDeDZQ6rME9Iic5lZicf2oxqibhZVeCA/0?wx_fmt=jpeg",
                            "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402553119&idx=1&sn=ffe890b52b4ab672c99c45a7f0ddefc4#rd"
                        );
                        break;
                    case "TZZR":
                        $contentStr[] = array(
                            "Title"=> "“创业红娘”平台投资阵容",
                            "Description"=>"2015年，多位中国顶级的VC前来武汉参加“创业相亲会”，对武汉的创投生态改善起到了极大的推动作用！",
                            "PicUrl"=>"http://mmbiz.qpic.cn/mmbiz/OIzxibr3LSaKHTCqRTJxODhyOhlQ8qCMibJVEia19ibXsk1LENjwvBgjBib4N54rcK6XIIXwibkCqEZYESN86Ol0M4xw/0",
                            "Url" =>"http://mp.weixin.qq.com/s?__biz=MzAxNjgzNjE0NQ==&mid=402472218&idx=1&sn=a8b65de2a5ef658ed00f4d5c8ca93333#rd");
                        break;
                    case "CGAL":
                        $accessToken = $this->getAccessToken();
                        $newsList = $this->getNewsList($accessToken);
                        preg_match_all('/\"title\":\"\【.*\】.*\",(.*)\"thumb_url\":\".*\"/U', $newsList, $res);
                        $contentStr = array();
                        $i = 0;
                        foreach($res[0] as $key){
                            $key = json_decode("{".$key."}", true);
                            $contentStr[] = array("Title"=> $key['title'], "Description"=>$key['digest'], "PicUrl"=>$key['thumb_url'], "Url" =>$key['url']);
                            if($i ++ > 9) break; //最多只能出10条
                        }
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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $output = curl_exec($ch);
        curl_close($ch);
        $result = str_replace(" ", "", str_replace(PHP_EOL, "", $output));
        return $result;
    }
}
?>