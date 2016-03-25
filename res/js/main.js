var pageNumber;
var peopleList;
var obj3;
var text;
var emailId;
var detailId;
<<<<<<< HEAD
var deleteId;
$(document).ready(function () {
    personGet();
    returnToM();
    $('.informationGroup').hide();
    $('#returnToM').hide();
=======
<<<<<<< HEAD
var deleteId;
$(document).ready(function () {
    personGet();
    returnToM();
    $('.informationGroup').hide();
    $('#returnToM').hide();
=======

$(document).ready(function () {
    personGet();
    $('.informationGroup').hide();

>>>>>>> 596bb3f2309eeeb6a9eba24bc933c4aa8f50ef03
>>>>>>> bcf111d0359ab084abda616617a8e4790e6f5cdd
});
function personGet() {
    $.get("http://localhost/cyhn2/users", {
        page: 0
    }, function (result) {
        var obj1 = JSON.parse(result);
        var obj2 = obj1.data;
        peopleList = obj2.users;
        var t = "";
        t += '<table data-toggle="table" data-side-pagination="server" data-pagination="true" data-page-list="[5,10,20,50]">';
        t += " <tr>" +
            "<td >姓名</td>" +
            "<td >电话</td>" +
            "<td>邮箱</td>" +
            "<td>学校</td>" +
            "<td>城市</td>" +
            "<td>项目名称</td>" +
            "<td>项目方向</td>" +
            "<td>详情</td>" +
            "<td>操作</td>" +
            "<td>删除</td>" +
            "</tr>";
        for (var i = 0; i < peopleList.length; i++) {
            t += "<tr >";
            t += "<div>";
            t += "<td>" + peopleList[i].name + "</td>";
            t += "<td>" + peopleList[i].phone + "</td>";
            t += "<td>" + peopleList[i].email + "</td>";
            t += "<td>" + peopleList[i].school + "</td>";
            t += "<td>" + peopleList[i].city + "</td>";
            t += "<td>" + peopleList[i].projectName + "</td>";
            t += "<td>" + peopleList[i].projectArea + "</td>";
            t += "<td>" + "<div class='detail'></div>" + "</td>";
            t += "<td>" + "<div class='sendEmail'></div>" + "</td>";
            t += "<td>" + "<div class='delete'></div>" + "</td>";
            t += "</div>";
            t += "</tr>";
        }
        t += "</table>";
        $('#tableList').html(t);
        $('.detail').each(function (q) {
            $(this).attr('id', 'detail' + q);
        });
        $('.sendEmail').each(function (e) {
            $(this).attr('id', 'sendEmail' + e);
        });
        $('.delete').each(function (h) {
            $(this).attr('id', 'delete' + h);
        });
        for (var k = 0; k < peopleList.length; k++) {
            var button = document.createElement("button");
            button.id = 'email' + peopleList[k].Id;
            button.innerHTML = '发送报名表';
            (function (k) {
                button.addEventListener("click", function (f) {
                    emailId = peopleList[k].Id;
                    emailGive();
                }, false);
            })(k);
            $('#sendEmail' + k).append(button);
            var aDetail = document.createElement("a");
            aDetail.id = 'a' + peopleList[k].Id;
            aDetail.innerHTML = '详情';
            (function (k) {
                aDetail.addEventListener("click", function (g) {
                    detailId = peopleList[k].Id;
                    detailShow();
                }, false);
            })(k);
            $('#detail' + k).append(aDetail);
            var delBtn = document.createElement("img");
            delBtn.id = 'del' + peopleList[k].Id;
<<<<<<< HEAD
            delBtn.src='../img/delete.png';
=======
>>>>>>> bcf111d0359ab084abda616617a8e4790e6f5cdd
            (function (k) {
                delBtn.addEventListener("click", function (d) {
                    deleteId = peopleList[k].Id;
                    tableDelete();
                }, false);
            })(k);
            $('#delete' + k).append(delBtn);
<<<<<<< HEAD
        }
    });
}
function emailGive() {
    $.post("http://localhost/cyhn2/users/" + emailId + "/email", function () {
        alert("邮件已经发送成功！")
    });
}
function detailShow() {
    $.get("http://localhost/cyhn2/users/" + detailId, function (res) {
        $('.informationGroup').show();
        $('#returnToM').show();
        $('#tableList').hide();
        var pro = JSON.parse(res);
        var detailList = pro.data;
        $('#name').val(detailList.name);
        $('#phone').val(detailList.phone);
        $('#email').val(detailList.email);
        $('#school').val(detailList.school);
        $('#city').val(detailList.city);
        $('#itemName').val(detailList.projectName);
        $('#direction').val(detailList.projectArea);
        $('#productionStage').val(detailList.projectInfo);
        $('#introduction').val(detailList.projectStatus);
        $('#ifFinance').val(detailList.projectIfCost);
        $('#amountFormer').val(detailList.projectCosted);
        $('#amountFuture').val(detailList.projectCost);
        returnToM();
    });
}
function returnToM() {
    $('#returnToM').click(function () {
        $('.informationGroup').hide();
        $('#tableList').show();
        $('#returnToM').hide();
    });
}
function tableDelete() {
    $.ajax({
        url: 'http://localhost/cyhn2/users/' + deleteId,
        type: 'DELETE',
        success: function () {
            alert("删除成功！");
            personGet();
=======
>>>>>>> bcf111d0359ab084abda616617a8e4790e6f5cdd
        }
    });
}
function emailGive() {
    $.post("http://localhost/cyhn2/users/" + emailId + "/email", function () {
        alert("邮件已经发送成功！")
    });
}
function detailShow() {
<<<<<<< HEAD
    $.get("http://localhost/cyhn2/users/" + detailId, function (res) {
        $('.informationGroup').show();
        $('#returnToM').show();
        $('#tableList').hide();
        var pro = JSON.parse(res);
        var detailList = pro.data;
        $('#name').val(detailList.name);
        $('#phone').val(detailList.phone);
        $('#email').val(detailList.email);
        $('#school').val(detailList.school);
        $('#city').val(detailList.city);
        $('#itemName').val(detailList.projectName);
        $('#direction').val(detailList.projectArea);
        $('#productionStage').val(detailList.projectInfo);
        $('#introduction').val(detailList.projectStatus);
        $('#ifFinance').val(detailList.projectIfCost);
        $('#amountFormer').val(detailList.projectCosted);
        $('#amountFuture').val(detailList.projectCost);
        returnToM();
    });
}
function returnToM() {
    $('#returnToM').click(function () {
        $('.informationGroup').hide();
        $('#tableList').show();
        $('#returnToM').hide();
    });
}
function tableDelete() {
=======
    $.get("http://localhost/cyhn2/users/1", function (res) {
        $('.informationGroup').show();
        $('#tableList').hide();

    });
>>>>>>> 596bb3f2309eeeb6a9eba24bc933c4aa8f50ef03

}