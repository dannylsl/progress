<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='<?= base_url()?>css/progress.css' />
<script type='text/javascript' src='<?= base_url()?>js/jquery-1.8.0.min.js'></script>
<script type='text/javascript'>
function show_add_dialog() {
<?php 
$str = file_get_contents('addtodo.html');
$str = str_replace(PHP_EOL, '', $str);
?>
var dialog="<div id='mask' class='mask'><div class='dialog'><div class='dialog-header'><div class='dialog-title'>Adding TODO </div><div class='dialog-close'><img src='".base_url()."images/remove.png' onClick='remove_add_dialog()'/></div></div> <!-- dialog-header end --><div class='dialog-content' id='dialog-content'></div></div></div>";
$('#endle').append(dialog);
$('#dialog-content').html("<?=$str;?>");
$('#mask').fadeIn();

}
function remove_add_dialog() {
    $('#mask').fadeOut();
    $('#mask').remove();
}
</script>
<title>PROGRESS</title>
</head>
<body>
<div id='header' class='header'>
  <div class='logo'>PROGRESS</div>
  <div class='nav_list'>
    <a href='#'>TODO</a> 
    <a href='#'>GOING</a> 
    <a href='#'>DONE</a> 
    <a href='#'>REPORT</a> 
    <a href='#'>SETTING</a> 
  </div>
  <div class='search'>
    <input type='text' class='sbox' placeholder='TYPE TO SEARCH' />
    <img src='<?= base_url();?>images/search.png' class='img_search '>
  </div>
</div> <!-- header end -->
<div class='container'>
<div style='height:35px;'>
<div class='title-state'><?= $event[0]['title'] ?></div>
<div class='item-stime'><?=$event[0]['start_date']?></div>
</div>
<div class='detail-content'>
    <div class='leftb'>
        <b><?=$event[0]['category']?></b><br>
        <?=$event[0]['description']?>
    </div>
    <div class='right-state'>
    STATE:
    <?
        if($event[0]['status'] == 1)
            echo "On-Going";
        else if($event[0]['status'] == 2)
            echo "Finished";
    ?>
    </div>
</div>
<div class="sp20"></div>

<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>

<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>

<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>

<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>


<div id='endle'></div>
</body>
</html>
