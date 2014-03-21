<?
if (isset($edit) && $edit) {
    $flag = True;
    echo form_open('progress/update_event');
    echo "<input type='hidden' value='{$event['id']}' name='eId' />";
} else {
    $flag = False;
    echo form_open('progress/save_event');
}
?>
<input type='text' class='dialog-input' name='title' placeholder='TITLE' <?=($flag)?"value='{$event['title']}'":"" ?>  />
<select class='dialog-select' name='category'>
    <? foreach($categorys as $cate) :?>
        <?
        if( $flag && ($cate['value'] == $event['category'])) {
            echo "<option value='{$cate['value']}' selected='selected'>{$cate['value']}</option>";
        }else {
            echo "<option value='{$cate['value']}'>{$cate['value']}</option>";
        }
        ?>
    <? endforeach;?>

</select>
<div class='sp15'></div>
<textarea class='dialog-textarea' id='jwysiwy_dialog' name='description' placeholder='CONTENT...'><?=($flag)?"{$event['description']}":"" ?></textarea>
<button type='submit'>Submit</button>
</form>
