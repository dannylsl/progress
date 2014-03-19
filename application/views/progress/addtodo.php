<?= form_open('progress/save_event'); ?>
<input type='text' class='dialog-input' name='title' placeholder='TITLE' />
<select class='dialog-select' name='category'>
  <option value='CATEGORY'>CATEGORY</option>
  <option value='WEEKLY WORK'>WEEKLY WORK</option>
  <option value='MISC'>MISC</option>
  <option value='TODO IN THE FUTURE'>TODO IN THE FURTURE</option>
</select>
<div class='sp15'></div>
<textarea class='dialog-textarea' id='jwysiwyg' name='description' placeholder='CONTENT...'></textarea>
<button type='submit'>Submit</button>
</form>
