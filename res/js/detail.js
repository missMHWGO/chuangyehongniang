/**
 * Created by JOYyuan on 16/4/4.
 */
var detailIdSec;
$(document).ready(function(){
        detailIdSec=Number(localStorage.detail);
    detailShow();
});
function detailShow() {
    $.get("http://www.chuangyehongniang.cn/users/" + detailIdSec, function (res) {
        var pro = JSON.parse(res);
        var detailList = pro.data;
        var stageNum = Number(detailList.projectStatus);
        var stage;
        switch (stageNum) {
            case 0:
                stage = "未有样品";
                break;
            case 1:
                stage = "已有样品";
                break;
            case 2:
                stage = "已进入市场";
                break;
            case 3:
                stage = "已放弃";
                break;
        }
        var financeNum = Number(detailList.projectIfCost);
        var ifNum;
        switch (financeNum) {
            case 0:
                ifNum = "否";
                break;
            case 1:
                ifNum = "是";
                break;
        }
        $('#name').val(detailList.name);
        $('#phone').val(detailList.phone);
        $('#email').val(detailList.email);
        $('#school').val(detailList.school);
        $('#city').val(detailList.city);
        $('#itemName').val(detailList.projectName);
        $('#direction').val(detailList.projectArea);
        $('#productionStage').val(stage);
        $('#introduction').val(detailList.projectInfo);
        $('#ifFinance').val(ifNum);
        $('#amountFormer').val(detailList.projectCosted + '万');
        $('#amountFuture').val(detailList.projectCost + '万');

    });
}

