<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="not-ie" lang="en">
<!--<![endif]-->

<head>
<link href="<?=base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<script src="<?=base_url() ?>js/jquery-1.7.2.min.js"></script>
<script>
function save_target(casename) {
    var platform = $('#platform').val();
    var device = $('#device').val();
    var value =  $('#target_'+casename).val();

    var obj = $.ajax({
        url:"<?=base_url() ?>index.php/socdata/target_save/"+platform+"/"+device+"/"+casename+"/"+value,
        async:false
    });
    $('#container').after(obj.responseText);
    $('#ret_msg').fadeIn(2000);
    $('#ret_msg').fadeOut(1000,function(){
        $('#ret_msg').remove();
    });
}
</script>

<title>[TARGET] <?=$platform.'-'.$device ?> </title>
<style>
.item-name {
font-size: 18px;
display:-moz-inline-box;
display:inline-block;
width: 250px;
height: 30px;
line-height: 30px;
float: left;
}
</style>
</head>

<body>

<div class="container" id='container'>
<div style='height:30px;'></div>
<h1>[TARGETS] <?=$platform.'-'.$device ?></h1>
<hr>
<input type='hidden' value='<?=$platform?>' id='platform' />
<input type='hidden' value='<?=$device?>' id='device' />
<div>
<?php
foreach($target_cases as $tcase) :
?>
<label for='target_<?=$tcase?>'><span class='item-name'><?=$tcase?></span>
<div class='input-append'>
    <input type='text' id='target_<?=$tcase?>' value='<?=$cases_targets[$tcase]['power']?>' />
    <span class='add-on'>mW</span>
    <input type='button' class='btn btn-success' style='margin-left: 10px;' onclick="save_target('<?=$tcase?>')"  value='SAVE AS NEW TARGET'/>
</div>
</label>
<? endforeach;?>
</div>
</div> <!-- container end -->
</form>

</body>
</html>
