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
        return;
    }
    var repassword = $('#repassword').val();
    if(repassword == "") {
        alert('重复密码不能为空');
        $('#repassword').focus();
        return;
    }
}

function uname_check() {
    var uname = $('#username').val();
    if(uname == "")
        return;
    $.ajax({
        url:"<?=base_url()?>index.php/progress/uname_check/"+uname,
        async:false,
        success:function(data, state) {
            $('#username').after(data);
        }
    });
}


$(document).ready(function() {
    $('#btn_reg').click(form_submit);
    $('#username').blur(uname_check);
    $('#username').focus(function(){
        $('#uname_span').remove();
    });
});

</script>
</head>
<body>
<div class='main'>
  <div class='login_table'>
    <form action='' method='post'>
    <h1>PROGRESS</h1>
    <div class='input_div'>
        <input type='text' name='username' id='username' class='input-login' placeholder='用户名'/>
    </div>
    <div>
        <input type='password' name='password' id='password' class='input-login' placeholder='密码'/>
    </div>
    <div>
        <input type='password' name='repassword' id='repassword' class='input-login' placeholder='重复密码'/>
    </div>
    <div>
      <input type='button' class='input-button' id='btn_reg' value='注册'>
    </form>
    </div>
  </div>
</div>

</body>
</html>
