<script type='text/javascript'>
function show_add_dialog() {
<?php
$str = file_get_contents(base_url().'index.php/progress/addtodo/'.$uId.'/'.$event['id']);
$str = str_replace(PHP_EOL, '', $str);
$str = str_replace("\"", "'", $str);
?>
    var mask="<div id='mask' class='mask'></div>";
    var dialog = "<div class='dialog' id='dialog' ><div class='dialog-header'><div class='dialog-title'>UPDATE EVENT </div><div class='dialog-close'><img src='<?=base_url()?>images/remove.png' onClick='remove_add_dialog()'/></div></div> <!-- dialog-header end --><div class='dialog-content' id='dialog-content'></div></div>";
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
<div style='height:35px;'>
<div class='title-state'><?= $event['title'] ?></div>
<div class='item-stime'><?=$event['start_date']?></div>
</div>
<div class='detail-content'>
    <div class='leftb'>
        <b><?=$event['category']?></b><br>
        <?=$event['description']?>
        <div class='leftb_operation'>
            <input type='button' class='input-button' value='Edit' onClick="show_add_dialog()" />
        </div>
    </div>
    <div class='right-state'>
    STATE:
    <?
        if($event['status'] == 1)
            echo "On-Going";
        else if($event['status'] == 2)
            echo "Finished ".$event['end_date'];
        else if($event['status'] == 0)
            echo "Deleted";
    ?>
    </div>
</div>
<div class="sp20"></div>

<script>
function edit_comment(eId, cId) {
    location.href="<?=base_url()?>index.php/progress/edit_comment/"+eId+'/'+cId;
}

function delete_comment(eId,cId) {
    if(confirm('ARE YOU SURE TO DELETE THIS COMMENT')) {
        location.href="<?=base_url()?>index.php/progress/delete_comment/"+eId+'/'+cId;
    }
}

</script>

<? foreach($comments as $c) : ?>
<div class='comment' id="comment-<?=$c['id']?>">
    <div class='comment-header'>
        <div class='comment-header-left'><?=$c['u1name']?></div>
        <div class='comment-header-right'><?=$c['date']?></div>
    </div>
    <div class='comment-body'>
		<div id="comment-md-<?=$c['id']?>"><?=$c['comment'];?></div>
		<script>
			var converter = new Markdown.Converter();
			var content = $("#comment-md-<?=$c['id']?>").html();
			var html = converter.makeHtml(content);
			$("#comment-md-<?=$c['id']?>").html(html);
		</script>
    </div>
    <div class='comment-opt'>
        <input type='button' class='comment-opt-btn' value='Edit'  onclick="edit_comment(<?=$event['id'].','.$c['id']?>)"/>
        <input type='button' class='comment-opt-btn comment-opt-btn-del' value='Delete' onclick="delete_comment(<?=$event['id'].','.$c['id']?>)"/>
    </div>
</div>
<? endforeach; ?>


<div class="sp20"></div>

<div class='comment-dialog'>
<?
if(isset($edit)&&$edit){
    echo form_open('progress/update_comment');
    echo "<input type='hidden' value='{$comment['id']}' name='cId' />";
}else {
    echo form_open('progress/add_comment');
}
    echo "<input type='hidden' value='{$event['title']}' name='e_title' />";
?>
    <input type='hidden' value='<?=$event['id']?>' name='eId'/>
	<!--
    <textarea name='comment2' id='jwysiwyg' class='comment-textarea'><?=(isset($edit)&&$edit)?$comment['comment']:"" ?></textarea>
    <div class="sp20"></div>
	-->

	<div class="wmd-panel wmd-preview" id="wmd-preview"></div>
	<div class="wmd-panel">
		<div id="wmd-button-bar"></div>
		<textarea name="comment" class="wmd-input" id="wmd-input"><?=(isset($edit)&&$edit)?$comment['comment']:"" ?></textarea>
		<script>
			var el = document.getElementById('wmd-input');
			tabIndent.render(el);
		</script>
	</div>

    <div align='right'>
		<input type='submit' class='input-button' value='ADD COMMENT'>
	</div>

	<script type="text/javascript">
		(function () {
			var converter1 = Markdown.getSanitizingConverter();
			
			converter1.hooks.chain("preBlockGamut", function (text, rbg) {
				return text.replace(/^ {0,3}""" *\n((?:.*?\n)+?) {0,3}""" *$/gm, function (whole, inner) {
					return "<blockquote>" + rbg(inner) + "</blockquote>\n";
				});
			});
			
			var editor1 = new Markdown.Editor(converter1);
			
			editor1.run();
			
			
			var help = function () { alert("Do you need help?"); }
			var options = {
				helpButton: { handler: help },
				strings: { quoteexample: "whatever you're quoting, put it right here" }
			};
		})();
	</script>


</form>
</div>
<script>
$('#jwysiwyg').wysiwyg();
</script>

<div class='event-state'>
<script>

function setfinished() {
    if(confirm('ARE YOU SURE SET IT FINISHED ?')) {
//        var obj = $.ajax({ url:"<?=base_url()?>index.php/progress/finish_event/<?=$event['id']?>", async: false});
        location.href="<?=base_url()?>index.php/progress/finish_event/<?=$event['id']?>";
    }
}

function del_event() {
    if(confirm('ARE YOU SURE DELETE IT ?')) {
//        var obj = $.ajax({ url:"<?=base_url()?>index.php/progress/delete_event/<?=$event['id']?>", async: false});
        location.href="<?=base_url()?>index.php/progress/delete_event/<?=$event['id']?>";
    }
}

</script>
<button onclick="setfinished()">SET FINISHED</button>
<button onclick="del_event()">DELETE</button>
</div>

</div>
<div id='endle'></div>
