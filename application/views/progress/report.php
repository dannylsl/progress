<div class='container'>
<ul class='weeklist'>
<?php
    for($i=$start_week; $i<=$cur_week; $i++)
        echo "<li><a href='".base_url()."index.php/progress/report_detail/$i'>WW{$i}</a></li>";
?>
</ul>

<div class='report' >
</div>

</div> <!-- container end -->
