<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel='stylesheet' type='text/css' href='<?= base_url()?>css/progress.css' />
<script type='text/javascript' src='<?= base_url()?>js/jquery-1.8.0.min.js'></script>
<title>PROGRESS LOGIN</title>
<script>
function isEmptyAlert(event) {
    id = event.data.id;
    warning = event.data.warning;
    var value = $('#'+id).val();
    if(value == '') {
        alert(warning);
        $('#'+id).focus();
        return true;
    }
    return false;
}

function isEmpty(id) {
    var value = $('#'+id).val();
    if(value == '') {
        $('#'+id).focus();
        return true;
    }
    return false;

}

function form_submit() {
    var ret_uname = isEmpty('username');
    var ret_pwd = isEmpty('password');
    if( (false == ret_pwd) && (ret_uname == false) ) {
        $('#login_form').submit();
    }
}

$(document).ready(function() {
    var udata = {id:"username", warning:"用户名不能为空"};
    $('#username').blur(udata,isEmptyAlert);
    var pwd = {id:"password", warning:"密码不能为空"};
    $('#password').blur(pwd,isEmptyAlert);

    $('#login').click(form_submit);
});

</script>
</head>
<body>
<div class='main'>
  <div class='login_table'>
    <form action='<?=base_url()?>index.php/progress/id_confirm' method='post' id='login_form'>
    <h1>PROGRESS</h1>
    <div><input type='text' name='username' id='username' class='input-login' placeholder='用户名'/></div>
    <div><input type='password' name='password' id='password' class='input-login' placeholder='密码'/></div>
    <div>
      <input type='button' id='login' class='input-button' value='登陆' />
      <input type='button' id='register' class='input-button' onclick="javascript:location.href='<?=base_url()?>index.php/progress/register'" value='注册' />
    </div>
    </form>
  </div>
</div>

</body>
</html>
