<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../res/js/jquery-2.2.0.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet " type="text/css" href="../res/css/manage.css">
    <script src="../res/js/main.js"></script>
    <title>manage</title>
</head>
<body>
<nav>
    <h1>创业红娘创业者信息</h1>
    <button id="returnToM">返回</button>
</nav>
<div id="tableList">
    <p id="pages"></p>
    <div id="pagesGroup"><ul class="pagination" id="pagesList"></ul></div>
</div>
<div class="informationGroup">
    <div class="title">
        <h3>创业红娘-创业者-报名信息</h3>
    </div>
    <div class="informationCon" id="informationCon">
        <div class="personCon">
            <h4>个人信息</h4>
            <hr>
            <div class="first1">
                <label class="firstLine" for="name">姓名</label>
                <input type="text" readonly="readonly" id="name">
                <label id="lbphone" class="firstLine" for="phone">电话</label>
                <input type="text" readonly="readonly" id="phone">
                <label class="firstLine" for="email">邮箱</label>
                <input type="text" readonly="readonly" id="email"><br>
            </div>
            <label class="firstLine" for="school">学校</label>
            <input type="text" readonly="readonly" id="school">
            <label class="specialLine1" for="city">所在城市</label>
            <input type="text" readonly="readonly" id="city">
        </div>
        <div class="itemCon">
            <h4 style="margin-bottom: 8px;margin-top: 50px">项目信息</h4>
            <hr>
            <div class="first1">
                <label class="firstLine" for="itemName">名称</label>
                <input type="text" readonly="readonly" id="itemName">
                <label class="firstLine" for="direction">方向</label>
                <input type="text" readonly="readonly" id="direction">
                <label for="productionStage">产品进展阶段</label>
                <input type="text" readonly="readonly" id="productionStage"><br>
            </div>
            <label class="firstLine" for="introduction">简介</label>
            <input style="width: 660px" type="text" readonly="readonly" id="introduction"><br>

            <div class="first1">
                <label for="ifFinance">之前是否融资</label>
                <input type="text" readonly="readonly" id="ifFinance">
                <label class="specialLine1" for="amountFormer">融资数额</label>
                <input type="text" readonly="readonly" id="amountFormer">
                <label class="specialLine2" for="amountFuture">拟融资数额</label>
                <input type="text" readonly="readonly" id="amountFuture">
            </div>
        </div>
    </div>
</div>
<!--删除确认框-->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    确认删除
                </h4>
            </div>
            <div class="modal-body">
                确认删除吗？该操作不能撤回
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">取消
                </button>
                <button type="button" class="btn btn-primary" id="delConfirm" style="background-color: #bcbcbc;border-color: #cecece">
                    确认
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>
</body>
</html>