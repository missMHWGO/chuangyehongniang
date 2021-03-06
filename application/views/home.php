<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="创业红娘报名">
    <meta name="keywords" content="创业红娘">
    <!-- 全屏显示 WebApp，隐藏 Safari 导航栏以及工具栏 -->
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <!-- 屏蔽iPhone下的拨号链接-->
    <meta content="telephone=no" name="format-detection" />
    <!-- 不让android识别邮箱 -->
    <meta content="email=no" name="format-detection" />
    <!-- 设置系统状态栏风格 -->
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <title>提交项目</title>
    <script type="text/javascript" src="../../static/js/lib/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../../static/js/lib/zepto.js"></script>
    <script type="text/javascript" src="../../static/js/lib/veryless.js"></script>
    <script type="text/javascript" src="../../static/js/scripts/city.js"></script>
    <link rel="stylesheet" type="text/css" href="../../static/css/index.css">
</head>

<body>
    <form method="post" action="users" name="form1">
        <div id="basicInfo">
            <div class="title">
                <p>个人信息</p>
            </div>
            <section>
                <div class="item">
                    <input type="text" name="name" id="name">
                    <label for="name">您的姓名</label>
                </div>
                <div class="item">
                    <input type="text" name="phone" id="phone">
                    <label for="phone">您的电话</label>
                </div>
                <div class="item">
                    <input type="text" name="email" id="email">
                    <label for="email">您的邮箱</label>
                </div>
                <div class="item">
                    <input type="text" name="school" id="school">
                    <label for="school">您的学校</label>
                </div>
                <div class="item">
                    <select id="province" name="province" onChange="selectcityarea('province','city','form1');">
                        <option value="" selected>请选择</option>
                    </select>
                    <select id="city" name="city">
                        <option value="" selected>请选择</option>
                    </select>
                    <label for="province">所在城市</label>
                </div>
            </section>
        </div>
        <div id="proProfile">
            <div class="title">
                <p>项目信息</p>
            </div>
            <section>
                <div class="item">
                    <input type="text" name="projectName" id="proName">
                    <label for="projectName">项目名称</label>
                </div>
                <div class="item">
                    <select name="projectArea" id="proDir">
                        <option value="">请选择</option>
                        <option value="电子商务">电子商务</option>
                        <option value="工具">工具</option>
                        <option value="移动应用">移动应用</option>
                        <option value="游戏">游戏</option>
                        <option value="文化艺术">文化艺术</option>
                        <option value="教育">教育</option>
                        <option value="营销服务">营销服务</option>
                        <option value="O2O">O2O</option>
                        <option value="媒体">媒体</option>
                        <option value="视频娱乐">视频娱乐</option>
                        <option value="健康医疗">健康医疗</option>
                        <option value="金融">金融</option>
                        <option value="搜索与安全">搜索与安全</option>
                        <option value="创业服务">创业服务</option>
                        <option value="硬件">硬件</option>
                        <option value="体育">体育</option>
                        <option value="其他">其他</option>
                    </select>
                    <label for="projectArea">项目方向</label>
                </div>
                <div>
                    <textarea id="proIntro" name="projectInfo" placeholder="30字以内" maxlength="30"></textarea>
                    <label for="projectInfo" id="proIntrodution">项目简介</label>
                </div>
                <div class="proDevelop">
                    <p>产品进展阶段</p>
                    <div class="proDev">
                        <input type="radio" value="0" name="projectStatus"><span>未有样品</span></div>
                    <div class="proDev">
                        <input type="radio" value="1" name="projectStatus"><span>已有样品</span></div>
                    <div class="proDev">
                        <input type="radio" value="2" name="projectStatus" checked="checked"><span>已进入市场</span></div>
                    <div class="proDev">
                        <input type="radio" value="3" name="projectStatus"><span>已放弃</span></div>
                </div>
                <div class="proDevelop">
                    <p>之前是否融资</p>
                    <div id="much">
                        <input type="text" name="projectCosted" id="money" placeholder="300万">
                        <label for="money">融资数额</label>
                    </div>
                    <div class="prodev"><input type="radio" value="0" name="projectIfCost" checked="checked"><span>是</span></div>
                    <div class="prodev"><input type="radio" value="1" name="projectIfCost"><span>否</span></div>
                    <div class="item" id="proMon">
                        <input type="text" name="projectCost" id="preMoney" placeholder="300万">
                        <label for="preMoney">拟融资数额</label>
                    </div>
                </div>
            </section>
        </div>
        <div id="proSubmit">
            <input class="submitIt" type="button" value="提交报名表">
        </div>
        <input type="hidden" name="openId" value=<?php echo $openId; ?> >
    </form>
    <script>
    first("province", "city", "form1", 0, 0);
    </script>
    <script type="text/javascript" src="../../static/js/scripts/index.js"></script>
</body>

</html>