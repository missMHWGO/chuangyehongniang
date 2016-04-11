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

</nav>
<div id="tableList">
</div>
<div id="pagesGroup">
    <p class="pageP"></p>
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
                <button type="button" class="btn btn-primary" id="delConfirm"
                        style="background-color: #bcbcbc;border-color: #cecece">
                    确认
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>
<!--邮件确认框-->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    发送邮件确认
                </h4>

            </div>
            <div class="modal-body" id="email">
                <input type="text" readonly="readonly" id="emailTo" style="width: 500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="emailCancel"
                        data-dismiss="modal">取消
                </button>
                <button type="button" class="btn btn-primary" id="emailConfirm"
                        style="background-color: #bcbcbc;border-color: #cecece">
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