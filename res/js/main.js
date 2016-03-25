var pageNumber;
var peopleList;

$(document).ready(function(){
personGet();
});
function personGet(){
    $.get("http://localhost/cyhn2/users",{
        page:0
    },function(result){
var obj=JSON.parse(result);
        peopleList = obj.data;
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
            t += "<td>"+"<div class='detail'></div>"+ "</td>";
            t += "<td>"+"<div class='sendEmail'></div>"+ "</td>";
            t += "</div>";
            t += "</tr>";
        }
        t += "</table>";
        $('#tableList').html(t);
        $('.detail').each(function(q) {
            $(this).attr('id', 'detail' + q);
            // You can also add more code here if you wish to manipulate each IMG element further
        });

        for(var k=0;k<peopleList.length;k++){
            var button = document.createElement("button");
            button.id = peopleList[k].Id;
            button.innerHTML = '123';
            $('.sendEmail').append(button);
        }
    });
}