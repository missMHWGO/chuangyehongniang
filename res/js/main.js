var pageNumber;
var peopleList;
var obj3;
var text;
var emailId;
var detailId;
var deleteId;
$(document).ready(function () {
    personGet();
    returnToM();
    tableColor();
    $('.informationGroup').hide();
    $('#returnToM').hide();
});
function personGet() {
    $.get("http://localhost/cyhn2/users", {
        page: 0
    }, function (result) {
        var obj1 = JSON.parse(result);
        var obj2 = obj1.data;
        peopleList = obj2.users;
        var t = "";
        t += '<table id="personTable" data-toggle="table" data-side-pagination="server" data-pagination="true" data-page-list="[5,10,20,50]">';
        t += " <tr>" +
            "<th class='nameTh' >姓名</th>" +
            "<th class='phoneTh'>电话</th>" +
            "<th class='emailTh'>邮箱</th>" +
            "<th class='schoolTh'>学校</th>" +
            "<th class='cityTh'>城市</th>" +
            "<th class='itemNameTh'>项目名称</th>" +
            "<th class='directionTh'>项目方向</th>" +
            "<th class='detailTh'>详情</th>" +
            "<th class='actionTh'>操作</th>" +
            "<th class='deleteTh'>删除</th>" +
            "</tr>";
        for (var i = 0; i < peopleList.length; i++) {
            t += "<tr >";
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
            var aEmail = document.createElement("a");
        aEmail.id = 'email' + peopleList[k].Id;
            aEmail.innerHTML = '发送报名表';
            (function (k) {
                aEmail.addEventListener("click", function (f) {
                    emailId = peopleList[k].Id;
                    emailGive();
                }, false);
            })(k);
            $('#sendEmail' + k).append(aEmail);
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
            delBtn.src='../img/delete.png';

            (function (k) {
                delBtn.addEventListener("click", function (d) {
                    deleteId = peopleList[k].Id;
                    $('#delModal').modal('show');
                    $('#delConfirm').click(function(){
                        tableDelete();
                    });
                }, false);
            })(k);
            $('#delete' + k).append(delBtn);
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
        url: 'http://localhost/cyhn2/users/'+deleteId,
        type: 'DELETE',
        success:function(){
            alert("删除成功");
        }
    });
}
function tableColor(){
    $('tr').css("background-color", "#f7f7f7");
    $('tr:odd' ).css("background-color", "#000000");
}