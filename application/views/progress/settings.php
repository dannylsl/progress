<div class='container'>
<h2>CATEGORY SETTINGS</h2>
<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>ITEM_NAME</th>
        <th>OPERATION</th>
    </tr>
    </thead>
    <tbody>
    <? $i = 1; ?>
    <? foreach($categorys as $cate) :?>
    <tr>
        <td><?=$i++?></td>
        <td><?=$cate['value']?></td>
        <td><img src='<?=base_url()?>images/remove.png' onclick="javascript:location.href='<?=base_url();?>index.php/progress/remove_category/<?=$cate['id']?>'" /></td>
    </tr>
    <? endforeach; ?>
    </tbody>
</table>
<hr width='40%'>

<div class='add_category'>

<?= form_open('progress/add_category'); ?>
    <input type='text' class='input-text' name='item_name' placeholder='ITEM NAME'/>
    <input type='submit' class='input-button' value='ADD' />
</form>

</div>

</div>
