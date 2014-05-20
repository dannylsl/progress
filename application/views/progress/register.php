<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='<?= base_url()?>css/progress.css' />
<script type='text/javascript' src='<?= base_url()?>js/jquery-1.8.0.min.js'></script>
<title>PROGRESS RESIGTER</title>
<script>

function form_submit(){
    var username = $('#username').val();
    if(username == "") {
        alert('用户名不能为空');
        $('#username').focus();
        return;
    }
    var password = $('#password').val();
    if(password == "") {
        alert('密码不能为空');
        $('#password').focus();
        return;
    }
    var repassword = $('#repassword').val();
    if(repassword == "") {
        alert('重复密码不能为空');
        $('#repassword').focus();
        return;
    }
    if($('#uname_ret').val() == 0) {
        alert('用户名已存在');
        $('#username').focus();
        return;
    }
    if($('#pwd_ret').val() == 0) {
        alert('密码不合法');
        $('#password').focus();
        return;
    }
    if($('#repwd_ret').val() == 0) {
        alert('密码和重复密码不匹配');
        $('#repassword').focus();
        return;
    }
    $('#form_reg').submit();
}

function uname_check() {
    var uname = $('#username').val();
    if(uname == "")
        return;
    $.ajax({
        url:"<?=base_url()?>index.php/progress/uname_check/"+uname,
        async:false,
        success:function(data, state) {
            if(data == '1') {
                $('#username').after("<span class='ajax_span' id='uname_span' style='red'>EXIST</span>");
                $('#uname_ret').val(0);
            }else if(data == '0') {
                $('#username').after("<span class='ajax_span' id='uname_span' style='color:green'>Available</span>");
                $('#uname_ret').val(1);
            }
        }
    });
}

function password_check() {
    var pwd = $('#password').val();
    if(pwd.length < 6) {
        $('#password').after("<span class='ajax_span' id='pwd_span' style='color:red'>Length<6</span>");
        $('#pwd_ret').val(0);
    }else{
        $('#password').after("<span class='ajax_span' id='pwd_span' style='color:green'>OK</span>");
        $('#pwd_ret').val(1);
    }
}

function repassword_check() {
    var pwd = $('#password').val();
    var repwd = $('#repassword').val();
    if(pwd != repwd) {
        $('#repassword').after("<span class='ajax_span' id='repwd_span' style='color:red'>Error</span>");
        $('#repwd_ret').val(0);
    }else {
        $('#repassword').after("<span class='ajax_span' id='repwd_span' style='color:green'>OK</span>");
        $('#repwd_ret').val(1);
    }
}

$(document).ready(function() {
    $('#btn_reg').click(form_submit);
    $('#username').blur(uname_check);
    $('#username').focus(function(){
        $('#uname_span').remove();
    });
    $('#password').blur(password_check);
    $('#password').focus(function(){
        $('#pwd_span').remove();
    });
    $('#repassword').blur(repassword_check);
    $('#repassword').focus(function(){
        $('#repwd_span').remove();
    });

});

</script>
</head>
<body>
<div class='main'>
  <div class='login_table'>
    <form action='<?=base_url()?>index.php/progress/newuser' id='form_reg' method='post'>
    <h1>PROGRESS</h1>
    <div class='input_div'>
        <input type='text' name='username' id='username' class='input-login' placeholder='用户名'/>
    </div>
    <div class='input_div'>
        <input type='password' name='password' id='password' class='input-login' placeholder='密码'/>
    </div>
    <div class='input_div'>
        <input type='password' name='repassword' id='repassword' class='input-login' placeholder='重复密码'/>
    </div>
    <div>
      <input type='button' class='input-button' id='btn_reg' value='注册'>
    </form>
    <input type='hidden' id='uname_ret' value='0'/>
    <input type='hidden' id='pwd_ret' value='0'/>
    <input type='hidden' id='repwd_ret' value='0'/>
    </div>
  </div>
</div>

</body>
</html>
