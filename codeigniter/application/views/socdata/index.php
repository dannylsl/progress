<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
<title>SOC WATCH DATA</title>
<!--
<script src="<?=base_url() ?>js/Chart.js"></script>
-->
<script src="<?=base_url() ?>js/jquery-1.7.2.min.js"></script>
<script>
function platform_change() {
    var plat = $('#platform').val();
    if (plat == 0){
        $('#device').empty();
        $('#device').append("<option value='0'>Choose</option>");
        $('#version').empty();
        $('#version').append("<option value='0'>Choose</option>");

        $('#device').attr('disabled', true);
        $('#version').attr('disabled', true);
        return;
    }
    var obj = $.ajax({url: "<?=base_url() ?>index.php/socdata/get_devices/" + plat , async:false});
    $('#device').attr('disabled', false);
    $('#device').empty();
    $('#device').append(obj.responseText);

}

function device_change() {
    var plat = $('#platform').val();
    var dev = $('#device').val();
    //console.log( "<?=base_url() ?>index.php/socdata/get_version/"+plat+'/'+dev);
    var obj = $.ajax({url: "<?=base_url() ?>index.php/socdata/get_version/"+plat+'/'+dev , async:false});
    //alert(obj.responseText);
    $('#version').attr('disabled', false);
    $('#version').empty();
    $('#version').append(obj.responseText);
}

$(document).ready(function(){
    $('#platform').change(platform_change);
    $('#device').change(device_change);
})

</script>

<style>
* {
margin: 0px;
padding: 0px;
}

html body {
width : 100%;
height: 100%;
}

div.container {
width : 100%;
position: absolute;
top:20%;

}
div.box {
width: 100%;
       margin-left: auto ;
       margin-right: auto ;
}
div.title {
width: 100%;
       font-size: 48px;
       font-weight: bold;
       text-align: center;
margin: 30px;
}

div.opt {
    text-align: center;
margin: 10px;
}
div.opt label {
    font-size: 28px;
}
select,input {
    font-size: 26px;
height: 38px;
padding: 2px;
}
div.submit {
    margin: 20px auto;
    padding-top: 10px;
    border-top: solid 1px #000;
    width: 800px;
}
</style>
</head>
<body>
<div class='container'>
<div class='box'>
<div class='title'>SOCDATA</div>
<?php
echo form_open('socdata/show');
?>
<div class='opt'>

<label for='platform'>PLATFORM:</label>
<select id='platform' name='platform'>
    <option value='0'>Choose</option>
<?
foreach( $platform as  $plat) {
    echo "<option value='".$plat['platform']."'>".$plat['platform']."</option>";
}

?>
</select>


<label for='device'>DEVICE:</label>
<select id='device' disabled='disabled' name='device'>
    <option value='0'>Choose</option>
<?
foreach( $devices as $dv) {
echo "<option value=''>".$dv['device']."</option>";
}
?>
</select>


<label for='version'>VERSION:</label>
<select id='version' disabled='disabled' name='version'>
    <option value='0'>Choose</option>
<?
foreach( $version as $v)
echo "<option value='".$v['week']."'>".$v['week']."</option>";
?>
</select>


<div class='submit'><input type='submit' value='Search'></div>
</div> <!-- div opt end -->
</form>
</div> <!-- div box end -->
</div> <!-- div container -->
</body>
</html>
