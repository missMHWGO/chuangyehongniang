var pageId = 0;
var peopleList;
var count;
var text;
var emailId;
var detailId;
var deleteId;
var emailStatus;
$(document).ready(function () {
    personGet();
    tableColor();
});
function personGet() {
    $.get("http://www.chuangyehongniang.cn/users", {
        page: pageId
    }, function (result) {
        var obj1 = JSON.parse(result);
        var obj2 = obj1.data;
        peopleList = obj2.users;
        count = obj2.count;
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
        var table = document.createElement('div');
        $(table).addClass('tableCon')
            .html(t)
            .appendTo($("#tableList")); //main div
        pageListBuild();
        $('.detail').each(function (q) {
            $(this).attr('id', 'detail' + q);
        });
        $('.sendEmail').each(function (e) {
            $(this).attr('id', 'sendEmail' + peopleList[e].Id);
        });
        $('.delete').each(function (h) {
            $(this).attr('id', 'delete' + h);
        });
        for (var k = 0; k < peopleList.length; k++) {
            var emailIf = Number(peopleList[k].email_status);
            switch (emailIf) {
                case 0:
                    emailStatus = "发送报名表";
                    var aEmail = document.createElement("a");
                    aEmail.id = 'email' + peopleList[k].Id;
                    aEmail.innerHTML = emailStatus;
                    break;
                case 1:
                    emailStatus = "已发送";
                    var emailInfo = document.createElement('input');
                    emailInfo.style.width = 100 + "px";
                    emailInfo.style.textAlign="center";
                    emailInfo.setAttribute("readonly", "readonly");
                    emailInfo.id = 'emailTo' + peopleList[k].Id;
                    $('#sendEmail' + peopleList[k].Id).append(emailInfo);
                    $('#emailTo' + peopleList[k].Id).val(emailStatus);
                    break;
            }

            if (emailIf == 0) {
                (function (k) {
                    aEmail.addEventListener("click", function (w) {
                        $('#emailConfirm').off('click');
                        emailId = peopleList[k].Id;
                        $('#emailModal').modal('show');
                        var v = "您确定将邮件发送给" + peopleList[k].projectName + "的负责人" + peopleList[k].name;
                        $('#emailTo').val(v);
                        $('#emailConfirm').one('click', function () {
                            $('#email' + peopleList[k].Id).remove();
                            $('#emailModal').modal('hide');
                            var emailAdd = document.createElement('input');
                            emailAdd.style.width = 100 + "px";
                            emailAdd.setAttribute("readonly", "readonly");
                            emailAdd.id = 'emailTo' + peopleList[k].Id;
                            emailAdd.style.textAlign="center";
                            $('#sendEmail' + peopleList[k].Id).append(emailAdd);
                            emailStatus="已发送";
                            emailGive();
                        });

                    }, false);
                })(k);
                $('#sendEmail' + peopleList[k].Id).append(aEmail);
            }
            var aDetail = document.createElement("a");
            detailId = peopleList[k].Id;
            aDetail.id = 'a' + peopleList[k].Id;
            aDetail.innerHTML = '详情';
            aDetail.setAttribute('target', '_blank');
            aDetail.href = "http://www.chuangyehongniang.cn/users/" + detailId + "/detail";
            (function (k) {
                aDetail.addEventListener("click", function (d) {
                    detailId = peopleList[k].Id;
                    localStorage.detail = detailId;
                }, false);
            })(k);

            $('#detail' + k).append(aDetail);
            var delBtn = document.createElement("img");
            delBtn.id = 'del' + peopleList[k].Id;
            delBtn.src = 'http://www.chuangyehongniang.cn/img/delete1.png';
            (function (k) {
                delBtn.addEventListener("click", function (d) {
                    $('#delConfirm').off('click');
                    deleteId = peopleList[k].Id;
                    $('#delModal').modal('show');
                    $('#delConfirm').one('click',function(){
                        tableDelete();
                    });
                }, false);
            })(k);
            $('#delete' + k).append(delBtn);
        }
    });

}
function emailGive() {
    $.post("http://www.chuangyehongniang.cn/users/" + emailId + "/email", emailEd());
}
function emailEd() {
    alert("邮件发送成功");
    $('#emailTo' + emailId).val(emailStatus);

}
function tableDelete() {
    $.ajax({
        url: 'http://www.chuangyehongniang.cn/users/' + deleteId,
        type: 'DELETE',
        success: function () {
            $('#delModal').modal('hide');
            alert("删除成功");
            location.reload();
        }
    });
}
function tableColor() {
    $('tr').css("background-color", "#f7f7f7");
    $('tr:odd').css("background-color", "#000000");
}
function pageListBuild() {
    var num1 = count / 10;
    var num2 = Number(num1);
    var pageCount = Math.ceil(num2);
    var pagesOut = "共有" + pageCount + "页,每页10条数据,共计" + count + "数据";
    var ulEle = document.createElement('ul');
    $('.pageP').html(pagesOut);
    $(ulEle).addClass('pagination')
        .appendTo($('#pagesGroup'));
    for (var i = 0; i < pageCount; i++) {
        var li = document.createElement("li");
        li.id = "page_" + i;
        $("ul").append(li);
    }
    for (var k = 0; k < pageCount; k++) {
        var turnValue = k + 1;
        var pageValue = "" + turnValue;
        var aPage = document.createElement("a");
        aPage.innerHTML = pageValue;
        (function (k) {
            aPage.addEventListener("click", function (g) {
                pageId = k;
                $('.tableCon').remove();
                $(ulEle).remove();
                personGet();
            }, false);
        })(k);
        $("#page_" + k).append(aPage);
    }
    $("#page_" + pageId).addClass("active");
}