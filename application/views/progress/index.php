<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='<?= base_url()?>css/progress.css' />
<script type='text/javascript' src='<?= base_url()?>js/jquery-1.8.0.min.js'></script>
<script type='text/javascript'>
function show_add_dialog() {
<?php
$str = file_get_contents(base_url().'index.php/progress/addtodo');
$str = str_replace(PHP_EOL, '', $str);
$str = str_replace("\"", "'", $str);
?>
    var mask="<div id='mask' class='mask'></div>";
    var dialog = "<div class='dialog' id='dialog' ><div class='dialog-header'><div class='dialog-title'>Adding TODO </div><div class='dialog-close'><img src='<?=base_url()?>images/remove.png' onClick='remove_add_dialog()'/></div></div> <!-- dialog-header end --><div class='dialog-content' id='dialog-content'></div></div>";
    $('#endle').after(mask);
    $('#mask').after(dialog);
    $('#dialog-content').html("<?=$str;?>");
    $('#mask').fadeIn();

}

function remove_add_dialog() {
    $('#dialog').fadeOut(1000);
    $('#mask').fadeOut(2000, function(){
        $('#dialog').remove();
        $('#mask').remove();
    });
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
    <img src='<?= base_url() ?>images/search.png' class='img_search '>
  </div>
</div> <!-- header end -->


<div class='container'>
  <div class='left'>
    <div class='operation'>
      <button onclick='show_add_dialog()'>ADD TODO</button>
    </div>

    <div class='list'>
    <? foreach($events as $e) : ?>
      <div class='item'>
        <div class='state'>
          <img src='<?= base_url() ?>images/arrow_right_black.png' />
        </div>
        <div class='item-content'><?=$e['title'];?></div>
        <div class='item-date'><?=$e['start_date']?></div>
      </div>
    <? endforeach; ?>

<!--
      <div class='item'>
        <div class='state'>
          <img src='images/checked.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
      <div class='item'>
        <div class='state'>
          <img src='images/circle_ko.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
      <div class='item'>
        <div class='state'>
          <img src='images/remove.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
      <div class='item'>
        <div class='state'>
          <img src='images/tick.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
      <div class='item'>
        <div class='state'>
          <img src='images/cross.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
      <div class='item'>
        <div class='state'>
          <img src='images/more.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
      <div class='item'>
        <div class='state'>
          <img src='images/arrow_right_black.png' />
        </div>
        <div class='item-content'>hello...lalalall</div>
        <div class='item-date'>2014-02-11</div>
      </div>
-->
    </div>
  </div> <!-- left end -->


  <div class='right'>
    <div class='calender'>
      <div class='calender-title'>Calender</div>
      <div class='calender-content'>
        <!-- TO DO CALENDER CONTETN-->
      </div>
    </div> <!-- calender content -->

    <div class='furture'>
      <div class='furture-title'>Furture</div>
      <ul class='furture-list'>
        <li>Hello World</li>
        <li>Hello WorldHello WorldHello WorldHello WorldHello World</li>
        <li>Hello World</li>
        <li>Hello World</li>
        <li>Hello World</li>
        <li>Hello World</li>
      </ul>
    </div> <!-- TODO IN THE FURTURE -->
  </div>
</div>
<div id='endle'></div>

</body>
</html>
