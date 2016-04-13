;
(function(win) {
    var lib = win.lib,
        rem = win.innerWidth / 16,
        isBlank = false;

    var index = {
        init: function() {
            var self = this;
            self.bindEvent();

        },

        bindEvent: function() {
            //用于检测输入
            $('#name').blur(function() {
                check_name($('#name').val(), 'name');
            });
            $('#phone').blur(function() {
                check_phone($('#phone').val());
            });
            $('#email').blur(function() {
                check_email($('#email').val());
            });
            $('#school').blur(function() {
                check_name($('#school').val(), 'school');
            });
            $('#proName').blur(function() {
                check_name($('#proName').val(), 'proName');
            });
            $('#proIntro').blur(function() {
                check_name($('#proIntro').val(), 'proIntro');
            });
            $('#money').blur(function() {
                check_empty($('#money').val(), 'money');
            });
            $('#money').blur(function() {
                check_number($('#money').val(), 'money');
            });
            $('#preMoney').blur(function() {
                check_empty($('#preMoney').val(), 'preMoney');
            });
            $('#preMoney').blur(function() {
                check_number($('#preMoney').val(), 'preMoney');
            });

            function check_email(email) {
                var re = new RegExp();
                re = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
                if (!email.match(re)) {
                    isBlank = true;
                    $('#email').css({
                        'border-color': '#D0021B',
                        'font-size': '0.5rem'
                    });
                    $('#email').attr('placeholder', '请输入正确的邮箱地址');
                    $('#email').click(function() {
                        isBlank = false;
                        $('#email').css({
                            'border-color': '#3bac9f',
                            'color': '#786e6e',
                            'font-size': '0.75rem'
                        });
                        $('#email').attr('placeholder', '');
                    });
                    return false;
                }
            }

            function check_phone(phone) {
                var re = new RegExp();
                re = /^\d{11}$/;
                if (!phone.match(re)) {
                    isBlank = true;
                    $('#phone').css({
                        'border-color': '#D0021B',
                        'font-size': '0.5rem'
                    });
                    $('#phone').attr('placeholder', '请输入正确的手机号码');
                    $('#phone').click(function() {
                        isBlank = false;
                        $('#phone').css({
                            'border-color': '#3bac9f',
                            'color': '#786e6e',
                            'font-size': '0.75rem'
                        });
                        $('#phone').attr('placeholder', '');
                    });
                    return false;
                }
            }

            function check_name(val, id) {
                var re = new RegExp();
                var reg = new RegExp();
                re = /^[\w\u4e00-\u9fa5]+$/;
                reg = /^[<script>.*</script>]+$/;
                if (val.match(reg)) {
                    val = "";
                }

                if (!val.match(re)) {
                    isBlank = true;
                    $('#' + id).css({
                        'border-color': '#D0021B',
                        'font-size': '0.5rem'
                    });
                    $('#' + id).attr('placeholder', '请输入正确的格式');
                    $('#' + id).click(function() {
                        isBlank = false;
                        $('#' + id).css({
                            'border-color': '#3bac9f',
                            'color': '#786e6e',
                            'font-size': '0.75rem'
                        });
                        $('#' + id).attr('placeholder', '');
                    });
                    return false;
                }
            }

            function check_number(val, id) {
                var re = new RegExp();
                re = /^\d*$/;
                if (!val.match(re)) {
                    isBlank = true;
                    $('#' + id).css({
                        'border-color': '#D0021B',
                        'font-size': '0.5rem'
                    });
                    $('#' + id).attr('placeholder', '请输入正确的数字');
                    $('#' + id).click(function() {
                        isBlank = false;
                        $('#' + id).css({
                            'border-color': '#3bac9f',
                            'color': '#786e6e',
                            'font-size': '0.75rem'
                        });
                        $('#' + id).attr('placeholder', '');
                    });
                    return false;
                }
            }

            function check_empty(val, id) {
                if (val == "") {
                    isBlank = true;
                    $('#' + id).css({
                        'border-color': '#D0021B',
                        'font-size': '0.5rem'
                    });
                    $('#' + id).attr('placeholder', '不为空');
                    $('#' + id).click(function() {
                        isBlank = false;
                        $('#' + id).css({
                            'border-color': '#3bac9f',
                            'color': '#786e6e',
                            'font-size': '0.75rem'
                        });
                        $('#' + id).attr('placeholder', '');
                    });
                    return false;
                }
            }


            $(document).on('change', '#province', function() {
                if (this.value != "香港" && this.value != "澳门" && this.value != "台湾") {
                    $("#city")[0].style.display = 'inline';
                } else {
                    $("#city")[0].style.display = 'none';
                }
            })

            $(document).on('touchend', '.proDev', function() {
                var self = this,
                    num = $(this).index() - 1,
                    pro = document.forms[0].projectStatus;
                pro[num].checked = true;

                $('.proDev').removeClass("check");
                $(this).addClass("check");
            })

            $("#much")[0].style.visibility = 'hidden';
            $(document).on('touchend', '.prodev', function() {
                var self = this,
                    num = $(this).index() - 2,
                    finan = document.forms[0].projectIfCost;
                finan[num].checked = true;

                $('.prodev').removeClass("check");
                $(this).addClass("check");
                if (num === 0) {
                    $("#much")[0].style.visibility = 'visible';
                } else if (num === 1) {
                    $("#much")[0].style.visibility = 'hidden';
                }
            })

            $(document).on('click', '.submitIt', function() {
                var self = this,
                    basicInput = [],
                    basicFormLength = 17,
                    form = document.forms[0];

                for (i = 0; i < basicFormLength; i++) {
                    basicInput.push(form.elements[i].value);
                    if ((basicInput[i] === "" && i != 13 && i != 5) || (basicInput[13] === "" && form.projectIfCost.value == '0') || (basicInput[5] === "" && basicInput[4] != "香港" && basicInput[4] != "澳门" && basicInput[4] != "台湾")) {
                        isBlank = true;
                        $input = form.elements[i].id;
                        $('body').scrollTop(0);
                        $('#' + $input).css({
                            'border-color': '#D0021B',
                            'font-size': '0.5rem'
                        });
                        $('#' + $input).attr('placeholder', '请填写此处');
                        $('#' + $input).click(function() {
                            isBlank = false;
                            $('#' + $input).css({
                                'border-color': '#3bac9f',
                                'color': '#786e6e',
                                'font-size': '0.75rem'
                            });
                            $('#' + $input).attr('placeholder', '');
                        });
                        return;
                    }
                }

                function check_proDev() {
                    var isCheck = false;
                    for (var i = 0; i < 4; i++) {
                        var temp = form.projectStatus[i];
                        if (temp.checked == true) {
                            isCheck = true;
                            break;
                        }
                    }
                    return isCheck;
                }
                checkProDev = check_proDev();

                function check_prodev() {
                    var isCheck = false;
                    for (var i = 0; i < 2; i++) {
                        var temp = form.projectIfCost[i];
                        if (temp.checked == true) {
                            isCheck = true;
                            break;
                        }
                    }
                    return isCheck;
                }
                checkProdev = check_prodev();

                if (isBlank == false && checkProDev == true && checkProdev == true) {
                    if (form.projectIfCost.value == '0') {
                        $('#money').val(0);
                    }
                    form.submit();
                    // setTimeout(function(){window.location.href = "application/views/success.html";},500);
                } else {
                    alert("请完成您的信息填写！");
                }

            })
        }

    }
    index.init();
})(window);
