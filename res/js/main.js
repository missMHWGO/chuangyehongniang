var pageNumber;
var peopleList;
var obj1;
var obj2;
var text;

$(document).ready(function () {
    personGet();
});
function personGet() {
    $.get("http://localhost/cyhn2/users", {
        page: 0
    }, function (result) {
         obj1 = JSON.parse(result);
        obj2=obj1.data;
        var obj3=obj2.count;
        for( var i=0;i<2;i++){
            text=obj2+"."+i;
            alert(text);
        }
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
        for (var k = 0; k < peopleList.length; k++) {
            var button = document.createElement("button");
            button.id = peopleList[k].Id;
            button.innerHTML = '发送报名表';
            $('#sendEmail' + k).append(button);
            var aDetail = document.createElement("a");
            aDetail.id = peopleList[k].Id;
            aDetail.innerHTML = '详情';
            $('#detail' + k).append(aDetail);
        }
    });
}