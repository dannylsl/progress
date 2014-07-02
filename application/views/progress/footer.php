<div class='footer'>
<div class='userinfo'>
    <div class='username'><?=$username?></div>
    <div class='datalist'>
        <ul>
            <li>TODO <?=$statistic['todos']?> </li>
            <li>DONE  <?=$statistic['dones']?></li>
            <li>HISTORY  <?=$statistic['history']?></li>
            <li>COMMENTS  <?=$statistic['comments']?></li>
        </ul>
    </div>
    <div class='exit'>
        <a href='<?=base_url()?>index.php/progress/safe_exit'>Safe Exit</a>
    </div>
</div>
</div>
</body>
</html>
