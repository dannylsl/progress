<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='style.css' />
<script type='text/javascript' src='js/jquery-1.8.0.min.js'></script>
<script type='text/javascript'>
function show_add_dialog() {
<?php 
$str = file_get_contents('addtodo.html');
$str = str_replace(PHP_EOL, '', $str);
?>
var dialog="<div id='mask' class='mask'><div class='dialog'><div class='dialog-header'><div class='dialog-title'>Adding TODO </div><div class='dialog-close'><img src='images/remove.png' onClick='remove_add_dialog()'/></div></div> <!-- dialog-header end --><div class='dialog-content' id='dialog-content'></div></div></div>";
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
    <img src='images/search.png' class='img_search '>
  </div>
</div> <!-- header end -->
<div class='container'>
<div style='height:35px;'>
<div class='title-state'>STATE  TITLE</div>
<div class='item-stime'>2014-02-13</div>
</div>
<div class='detail-content'>
<div class='leftb'>
Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean black-eyed pea maize eggplant. Cabbage lentil cucumber chickpea sorrel gram garbanzo plantain lotus root bok choy squash cress potato summer purslane salsify fennel horseradish dulse. Winter purslane garbanzo artichoke broccoli lentil corn okra silver beet celery quandong. Plantain salad beetroot bunya nuts black-eyed pea collard greens radish water spinach gourd chicory prairie turnip avocado sierra leone bologi.
</div>
</div>
<div id='endle'></div>
</body>
</html>
