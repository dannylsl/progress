<div class='container'>
<div style='height:35px;'>
<div class='title-state'><?= $event[0]['title'] ?></div>
<div class='item-stime'><?=$event[0]['start_date']?></div>
</div>
<div class='detail-content'>
    <div class='leftb'>
        <b><?=$event[0]['category']?></b><br>
        <?=$event[0]['description']?>
    </div>
    <div class='right-state'>
    STATE:
    <?
        if($event[0]['status'] == 1)
            echo "On-Going";
        else if($event[0]['status'] == 2)
            echo "Finished";
    ?>
    </div>
</div>
<div class="sp20"></div>

<? foreach($comments as $c) : ?>
<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'><?=$c['u1name']?></div>
        <div class='comment-header-right'><?=$c['date']?></div>
    </div>
    <div class='comment-body'>
        <?=$c['comment'];?>
    </div>
</div>
<? endforeach; ?>

<!--
<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>

<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>

<div class='comment'>
    <div class='comment-header'>
        <div class='comment-header-left'>Danny Lee </div>
        <div class='comment-header-right'>2014-03-18</div>
    </div>
    <div class='comment-body'>
        helloworld helloworld helloworld helloworld<br>
        helloworld helloworld
    </div>
</div>
-->

<div class="sp20"></div>

<div class='comment-dialog'>
<?= form_open('progress/add_comment'); ?>
    <input type='hidden' value='<?=$event[0]['id']?>' name='eId'/>
    <textarea name='comment' id='jwysiwyg' class='comment-textarea'></textarea>
    <div class="sp20"></div>
    <div align='right'><input type='submit' class='input-button' value='ADD COMMENT'></div>
</form>
</div>
<script>
$('#jwysiwyg').wysiwyg();
</script>

<div class='event-state'>
<button>SET FINISHED</button>
<button>DELETE</button>
</div>


<div id='endle'></div>
</body>
</html>
