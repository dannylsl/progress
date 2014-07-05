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
    <div class='calender'>
      <div class='calender-title'>Calender</div>
      <div class='calender-content'>
        <!-- TO DO CALENDER CONTETN-->
		<table id="calendar_panel" class="table_calendar_panel">
			<tr>
				<td>&lt;</td>
				<td colspan="5">2014</td>
				<td>&gt;</td>
			</tr>
		</table>
		<table class="table_calendar">
		<thead>
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
		function calendar() {
			var today = new Date();
			var year  = today.getFullYear();
			var month = today.getMonth()+1;

			var startDay = new Date(year, month - 1,1).getDay();
			console.log("Start Day="+startDay);

			var nDays = new Date(year, month, 0).getDate();

			var column_count = 0;		
			var day_count = 0;	
			var calendar_table = "";
			for(day_count = 0; day_count < startDay; day_count++ ) {
				if(day_count == 0) {
					calendar_table = "<tr>";
				}
				calendar_table += "<td></td>";	
				column_count ++;
			}
			for (var nDay_id = 0; nDay_id < nDays; nDay_id++) {
				if(column_count == 7) {
					calendar_table += "</tr><tr>";	
					column_count = 0;
				}
				calendar_table += "<td>"+(nDay_id+1)+"</td>";	
				column_count++;
			}
			for(;column_count <= 7; column_count++){
				if(column_count == 7) {
					console.log(column_count);
					calendar_table += "</tr>";	
				}else{
					calendar_table += "<td></td>";	
				}
			}
			document.getElementById('calendar_body').innerHTML=calendar_table;	
		}
		calendar();
		</script>
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

