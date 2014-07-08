
<script type='text/javascript' src='<?= base_url()?>js/calendar.js'></script>
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
    <? if(isset($done) && $done) echo "<h2>Done</h2>"; ?>

    <div class='list'>
    <? foreach($events as $e) : ?>
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
    <div class='calendar'>
      <div class='calendar-title'>Calendar</div>
      <div class='calendar-content'>
        <!-- TO DO CALENDAR CONTETN-->
		<div style="display:none" id="logs"><?=json_encode($calendar);?></div>
		<table class="table_calendar">
		<thead>
			<tr>
				<td>&lt;</td>
				<td colspan="5"><div id="cur_date"></div></td>
				<td>&gt;</td>
			</tr>
			<tr>
				<th>S</th>
				<th>M</th>
				<th>T</th>
				<th>W</th>
				<th>T</th>
				<th>F</th>
				<th>S</th>
			</tr>		
		</thead>
		<tbody id="calendar_body">
		</tbody>
		</table>
		<script>
			var logs = $.parseJSON($("#logs").html())
			calendar(logs);
		</script>
      </div>
    </div> <!-- calendar content -->

    <div class='recent'>
      <div class='recent-title'>Recent Edit</div>
      <ul class='recent-list'>
		<?php
		foreach($recents as $re) {
			echo "<li><a href='".base_url()."index.php/progress/detail/{$re['eId']}'>{$re['e_title']}</a></li>";
		}
		?>
      </ul>
    </div> <!-- TODO IN THE FURTURE -->
  </div>
</div>
<div id='endle'></div>

