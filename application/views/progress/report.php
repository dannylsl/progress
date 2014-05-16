<div class='container'>
<ul class='weeklist'>
<?php
    for($i = $start_week['year']; $i <= $cur_week['year']; $i++)
        for($j=$start_week['week']; $j<=$cur_week['week']; $j++)
            echo "<li><a href='".base_url()."index.php/progress/report_detail/$i/$j'>{$i}ww{$j}</a></li>";
//    for($i=$start_week; $i<=$cur_week; $i++)
?>
</ul>

<div class='report' >

<h1>REPORT OF 2014 WW19</h1>

<h2>WEEKLY WORK</h2>
<p>
hello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello world
</p>

<h2>AUTO VPNP</h2>



</div>

</div> <!-- container end -->
