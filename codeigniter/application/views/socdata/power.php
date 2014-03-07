<html>
<head>
<link href="<?=base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<script src="<?=base_url() ?>js/jquery-1.7.2.min.js"></script>

<title>POWER</title>
<script>
function updata_power(casename) {
    var value = $('#input_'+casename).val();
    if(value == "") {
        alert('PLEASE SET THE VALUE BEFORE UPDATA!');
        $('#input_'+casename).focus();
        return;
    }
    var obj = $.ajax({url: "<?=base_url() ?>index.php/socdata/updata_power/<?=$platform.'/'.$device.'/'.$week.'/'?>"+casename+"/"+value, async:false});
    $('#powerlist').after(obj.responseText);
    $('#ret_msg').fadeIn(2000);
    $('#ret_msg').fadeOut(1000,function(){
        $('#ret_msg').remove();
    });
}
</script>
<style>
.item-name {
font-size: 18px;
display:-moz-inline-box;
display:inline-block;
width: 250px;
}
</style>
</head>

<body>
<?php
//print_r($cases);
//print_r($power);
$power_list = array();
foreach( $power as $p) {
    $power_list[$p['case_name']] = $p['value'];
}
//print_r($power_list);
?>

<div class="container"  id='powerlist' >
<h1 id='title'>[POWER]   <?=$platform.'-'.$device.'-'.$week ?></h1>
<div style='height:30px;'></div>
<?php
foreach($cases as $case) {
    echo "<label for='input_".$case['case_name']."'><span class='item-name'>".$case['case_name']."</span>";
    echo "<div class='input-append '>";
    $casename = $case['case_name'];
    if(isset($power_list[$casename])){
        $value = $power_list[$casename];
        echo "<input type='text' style='height:30px;margin: 0px 0px 0px 10px;' value='".$value."' id='input_".$case['case_name']."'/>";
    }else{
        $value = 'NOT SET';
        echo "<input type='text' style='height:30px;margin: 0px 0px 0px 10px;' placeholder='".$value."' id='input_".$case['case_name']."'/>";
    }
    echo "<span class='add-on'>mW</span>";
    echo "<input type='button' class='btn btn-success' style='margin-left: 10px;' value='Updata' onclick=\"updata_power('".$case['case_name']."')\">";
    echo "</div>";
    echo "</label>";
}
?>
</div>
</form>

</body>
</html>
