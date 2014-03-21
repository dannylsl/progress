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
    $('#jwysiwy_dialog').wysiwyg();

}

function remove_add_dialog() {
    $('#dialog').fadeOut(1000);
    $('#mask').fadeOut(2000, function(){
        $('#dialog').remove();
        $('#mask').remove();
    });
}
</script>

<div class='container'>
  <div class='left'>
    <div class='operation'>
      <button onclick='show_add_dialog()'>ADD TODO</button>
    </div>
    <h2>Events Done</h2>

    <div class='list'>

    <?
    $line_date = "";
    foreach($events as $e) : ?>
    <?
        $datetime_arr = explode(' ', $e['end_date']);
        $date = $datetime_arr[0];
        if($line_date == "") {
            echo "<h3>$date</h3>";
            $line_date = $date;
        }else if($line_date != "" && $line_date != $date){
            echo "<h3>$date</h3>";
            $line_date = $date;
        }

    ?>

      <div class='item' onclick="javascript:location.href='<?=base_url()?>index.php/progress/detail/<?=$e['id']?>'">
        <div class='state'>
          <img src='<?= base_url() ?>images/arrow_right_black.png' />
        </div>
        <div class="item-body">
            <div class='item-content'>
                <?=$e['title'];?>
                <div class='item-content-category'><?=$e['category']?></div>
            </div>
            <div class='item-date'><?=$e['start_date']?></div>
        </div>
      </div>


    <? endforeach; ?>

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
