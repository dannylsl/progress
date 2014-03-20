<?= form_open('progress/save_event'); ?>
<input type='text' class='dialog-input' name='title' placeholder='TITLE' />
<select class='dialog-select' name='category'>
    <? foreach($categorys as $cate) :?>
        <option value='<?=$cate['value']?>'><?=$cate['value']?></option>
    <? endforeach;?>

</select>
<div class='sp15'></div>
<textarea class='dialog-textarea' id='jwysiwyg' name='description' placeholder='CONTENT...'></textarea>
<button type='submit'>Submit</button>
</form>
