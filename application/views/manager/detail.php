<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet " type="text/css" href="/res/css/detail.css">
    <script src="/res/js/main.js"></script>
    <title>detail</title>
</head>
<body>
<nav>
    <h1>创业红娘创业者信息</h1>
</nav>
<div class="informationGroup">
    <div class="title">
        <h3>创业红娘-创业者-报名信息</h3>
    </div>
    <div class="informationCon">
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
</body>
</html>