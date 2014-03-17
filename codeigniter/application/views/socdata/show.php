
<link href="<?=base_url() ?>css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url() ?>css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?=base_url() ?>css/tablecloth.css" rel="stylesheet">
<link href="<?=base_url() ?>css/prettify.css" rel="stylesheet">

<script src="<?=base_url() ?>js/jquery-1.7.2.min.js"></script>
<script src="<?=base_url() ?>js/jquery.tablecloth.js"></script>
<script src="<?=base_url() ?>js/Chart.js"></script>

<!--[if lt IE 9]>
<script src="<?=base_url() ?>js/excanvas.js"></script>
<![endif]-->

<script type="text/javascript" charset="utf-8">
function toggle_display(casename) {
//    console.log($('#checkbox_'+casename).attr('checked'));
    if( 'checked' == $('#checkbox_'+casename).attr('checked') ) {
        $('#cstate_table_'+casename).css('display','table');
        $('#pstate_table_'+casename).css('display','table');
        $('#ncstate_table_'+casename).css('display','table');
        $('#wakeups_table_tr_'+casename).css('display','table-row');
        $('#fps_table_tr_'+casename).css('display','table-row');
        $('#power_table_tr_'+casename).css('display','table-row');
    }else{
        $('#cstate_table_'+casename).css('display','none');
        $('#pstate_table_'+casename).css('display','none');
        $('#ncstate_table_'+casename).css('display','none');
        $('#wakeups_table_tr_'+casename).css('display','none');
        $('#fps_table_tr_'+casename).css('display','none');
        $('#power_table_tr_'+casename).css('display','none');
    };
}
$(document).ready(function() {
$("table").tablecloth({
theme: "default",
striped: true,
sortable: true,
condensed: true
});
        });
</script>
<style>

h1 {
    padding: 20px 0px 0px 20px;
}

h2 {
padding-left: 20px;
border-left: solid blue 10px;
margin-left: 10px;
margin-bottom: 10px;
}

table thead tr > td {
    background-color:#329fe7;
    color:#fff;
    text-align: center;
    padding:auto;
}

.cstate{
    margin:40px 20px 30px 20px;
    overflow: auto;
}

.ncstate{
    margin:40px 20px 10px 20px;
    overflow: auto;
}

.other{
    margin:40px 20px 10px 20px;
    overflow: auto;
}

.charts{
    margin:40px 20px 10px 20px;
    overflow: auto;
}
.chart {
    width: 400px;
    float:left;
    margin: 10px;
    border: solid 1px #fff;
}
.chart:hover {
    border: solid 1px #ccc;
    width: 400px;
    float:left;
    margin: 10px;
}
.chart_title {
    text-align: center;
    font: 18px bold;
    color: #fff;
    background-color: #999;
    padding: 3px;
}

table.cstate_table{
    float: left;
    margin: 10px;
}

table.cstate_table tr td {
    text-align: center;
}

table.pstate_table{
    margin: 10px;
}

table.ncstate_table{
    float: left;
}

table.other_table{
    margin: 10px;
    float: left;
}
</style>

<?php
//print_r($cases);
//print_r($cores);
//print_r($wakeups);
//print_r($fps);
$core_num = 0;
$core_list = array();
foreach($cores as $core) {
    if(strtolower($core['core_num']) != 'core all')
    $core_num++;
    array_push($core_list, $core['core_num']);
}

//echo "core_num=$core_num<br><br><br>";
$cases_num = count($cases);
//print_r($socdata);
//print_r($pstate);
//print_r($ncstate);

?>
<br>

<?php
function cstate_table($casename, $cstate, $core_num) {
    echo "<table id='cstate_table_$casename' class='cstate_table table-bordered'>";
    echo "<thead><tr>";
    echo "<td colspan='5' >CSTATE-$casename</td>";
    echo "</tr></thead>";
    echo "<tbody>";
    echo "<tr><td>CORES</td>";
    for($j = 0; $j < $core_num; $j++){
        echo "<td>Core $j</td>";
    }
    echo "</tr>";

    $cc = "";
    $cc_count = 0;
    foreach($cstate as $cs_item) {
        if($cs_item['case_name']== $casename) {
            if($cc != $cs_item['item_name']) {
                $cc = $cs_item['item_name'];
                $cc_count = 1;
                echo "<tr>";
                echo "<td>".$cc."</td>";
            }else {
                if ($cc_count == $core_num) {
                    echo "</tr>";
                }
                $cc_count ++;
            }
            echo "<td>".$cs_item['value']."</td>";
        }
    }
    echo "</tbody></table>";
}
?>


<?php
function pstate_table($casename, $pstate, $core_num) {
    echo "<table  id='pstate_table_$casename' class='pstate_table table-bordered'>";
    echo "<body>";
    for($j = 0; $j < $core_num; $j++){
        echo "<tr>";
        if($j == 0){
            echo "<td rowspan='".($core_num*2)."' style='width:65px;table-layout:fixed;word-break:break-all;background-color:#EBA741;color:#fff;'>".str_replace('_', '<br>', $casename)."</td>";
        }
        echo "<td width='50' rowspan='2'>Core$j</td>";
        $cc = "core ".$j;

        foreach($pstate as $ps_item){
            if($ps_item['core_num'] == $cc && $ps_item['case_name'] == $casename){
                echo "<td style='background-color:#faf2cc;'>".$ps_item['item_name']."</td>";
            }
        }
        echo "<tr>";
        foreach($pstate as $ps_item){
            if($ps_item['core_num'] == $cc && $ps_item['case_name'] == $casename){
                if($ps_item['value'] == "0.0%")
                    echo "<td>".$ps_item['value']."</td>";
                else if( (float)($ps_item['value']/100) > 0.1)
                    echo "<td style='background-color:#d14;color:#fff;'>".$ps_item['value']."</td>";
                else
                    echo "<td style='background-color:#d0e9c6;'>".$ps_item['value']."</td>";
            }
        }
        echo "</tr>";
        echo "</tr>";
    }
    echo "</body></table>";
}


?>

<?php
function ncstate_table($casename, $ncstate) {

    echo "<table id='ncstate_table_$casename' class='pstate_table ncstate_table table-bordered'>";
    echo "<thead>";
    echo "<tr><td colspan='2'>$casename</td></tr>";
    echo "</thead><tbody>";

    foreach($ncstate as $nc_item) {
        if($nc_item['case_name'] == $casename){
            echo "<tr>";
            echo "<td>".$nc_item['item_name']."</td>";
            echo "<td>".$nc_item['value']."</td>";
            echo "</tr>";
        }
    }
    echo "</tbody></table>";
}
?>
<?php

function wakeups_table($case='all', $wakeups){
echo "<table class='other_table table-bordered'>";
echo "<thead><tr><td colspan='2'>WU/sec/core</td></tr></thead>";
echo "<tbody>";
foreach($wakeups as $wk_item) {
    if($case == 'all'){
        echo "<tr id='wakeups_table_tr_".$wk_item['case_name']."' >";
        echo "<td>".$wk_item['case_name']."</td>";
        echo "<td>".$wk_item['value']."</td>";
        echo "</tr>";
    }else if($wk_item['case_name'] == $case) {
        echo "<tr id='wakeups_table_tr_".$wk_item['case_name']."' >";
        echo "<td>".$wk_item['case_name']."</td>";
        echo "<td>".$wk_item['value']."</td>";
        echo "</tr>";
    }
}
echo "</tbody>";
echo "</table>";
}


function fps_table($case='all', $fps){
echo "<table class='other_table table-bordered'>";
echo "<thead><tr><td colspan='2'>FPS</td></tr></thead>";
echo "<tbody>";
foreach($fps as $fps_item) {
    if($case == 'all'){
        echo "<tr id='fps_table_tr_".$fps_item['case_name']."' >";
        echo "<td>".$fps_item['case_name']."</td>";
        echo "<td>".$fps_item['value']."</td>";
        echo "</tr>";
    }else if($fps_item['case_name'] == $case) {
        echo "<tr id='fps_table_tr_".$fps_item['case_name']."' >";
        echo "<td>".$fps_item['case_name']."</td>";
        echo "<td>".$fps_item['value']."</td>";
        echo "</tr>";
    }
}
echo "</tbody>";
echo "</table>";
}


function power_table($case='all', $power, $power_pre, $targets){
echo "<table class='other_table table-bordered'>";
echo "<thead><tr><td colspan='2'>POWER</td>";
echo "<td colspan='2'>TREND</td>";
echo "<td>TARGET</td><td>PERCENT</td><td>GAP</td></tr></thead>";
echo "<tbody>";
foreach($power as $p_item) {
    if($case == 'all'){
        echo "<tr id='power_table_tr_".$p_item['case_name']."' >";
        echo "<td>".$p_item['case_name']."</td>";
        echo "<td>".$p_item['value']."</td>";
        if(isset($power_pre[$p_item['case_name']])) {
            $diff = $p_item['value'] - $power_pre[$p_item['case_name']];
            $diff = round($diff, 2);
            if($diff > 0) {
                echo "<td><i class='icon-arrow-up'></i></td>";
                echo "<td>$diff mw</td>";
            }else if($diff < 0) {
                echo "<td><i class='icon-arrow-down'></i></td>";
                echo "<td>". round(($power_pre[$p_item['case_name']] - $p_item['value']), 2)." mw</td>";
            }else {
                echo "<td>-</td>";
                echo "<td> 0 mw </td>";
            }
        }else{
                echo "<td>-</td>";
                echo "<td> 0 mw </td>";
        }
        $target_power = $targets[$p_item['case_name']]['power'];
        echo "<td>$target_power</td>";

        if($p_item['value'] == 0){
            $target_percent = 'NULL';//$target_power/float($p_item['value']);
        }

        $target_percent = round(($target_power/($p_item['value']))*100, 2);
        if($target_percent <= 70) {
            echo "<td style='background-color:#FF5E5E;color:#;'>$target_percent%</td>";
        }else if($target_percent > 70 && $target_percent < 80) {
            echo "<td style='background-color:#FFC480;'>$target_percent%</td>";
        }else if($target_percent >= 80 && $target_percent < 90) {
            echo "<td style='background-color:#FCFF90;'>$target_percent%</td>";
        }else if($target_percent >= 90) {
            echo "<td style='background-color:#B0FFB0;'>$target_percent%</td>";
        }

        $target_gap = ($p_item['value']) - $target_power;
        echo "<td>$target_gap</td>";

        echo "</tr>";
    }else if($p_item['case_name'] == $case) {
        echo "<tr id='power_table_tr_".$p_item['case_name']."' >";
        echo "<td>".$p_item['case_name']."</td>";
        echo "<td>".$p_item['value']."</td>";
        echo "</tr>";
    }
}
echo "</tbody>";
echo "</table>";
}
?>

<div align='center' style='margin: 0px auto 30px auto'>
<h1>DISPLAY ON/OFF</h1>
<?php
foreach($cases as $case) {
echo "<label class='checkbox inline'><input id='checkbox_".$case['case_name']."' type='checkbox' checked=checked onclick=\"toggle_display('{$case['case_name']}') \"/><span style='font-size:18px;'>".$case['case_name']."</span></label>";
}
?>
</div>

<h2>CSTATE</h2>
<div class='cstate'>
<?php
foreach($cases as $case) {
    cstate_table($case['case_name'], $cstate, $core_num);
}
//cstate_table('video_playback_1080p', $cstate, $core_num);
//cstate_table('video_playback_1080p_frc', $cstate, $core_num);
//cstate_table('video_playback_1080p_60fps', $cstate, $core_num);
//cstate_table('video_playback_720p_60fps', $cstate, $core_num);
//cstate_table('stream_chrome', $cstate, $core_num);
//cstate_table('stream_stock', $cstate, $core_num);
//cstate_table('record_social_1080p', $cstate, $core_num);
?>
</div>

<h2>PSTATE</h2>
<div class='pstate'>
<?php
foreach($cases as $case) {
    pstate_table($case['case_name'], $pstate, $core_num);
}
//pstate_table('video_playback_1080p', $pstate, $core_num);
//pstate_table('video_playback_1080p_frc', $pstate, $core_num);
//pstate_table('video_playback_1080p_60fps', $pstate, $core_num);
//pstate_table('video_playback_720p_60fps', $pstate, $core_num);
//pstate_table('stream_chrome', $pstate, $core_num);
//pstate_table('stream_stock', $pstate, $core_num);
//pstate_table('record_social_1080p', $pstate, $core_num);
?>
</div>

<h2>NC-STATE</h2>
<div class='ncstate'>
<?php
foreach($cases as $case) {
ncstate_table($case['case_name'], $ncstate);
}
//ncstate_table('video_playback_1080p', $ncstate);
//ncstate_table('video_playback_1080p_frc', $ncstate);
//ncstate_table('video_playback_1080p_60fps', $ncstate);
//ncstate_table('video_playback_720p_60fps', $ncstate);
//ncstate_table('stream_chrome', $ncstate);
//ncstate_table('stream_stock', $ncstate);
//ncstate_table('record_social_1080p', $ncstate);
?>
</div>


<h2>WAKEUPS | FPS | POWER</h2>
<div class='other'>
<?php
wakeups_table('all',$wakeups);
fps_table('all',$fps);

$p_pre_arr =array();
foreach($power_pre as $p_pre) {
    $p_pre_arr[$p_pre['case_name']] = $p_pre['value'];
}
//print_r($p_pre_arr);
power_table('all',$power, $p_pre_arr, $cases_targets);
?>
</div>

<center>
<input type='button' class='btn btn-large btn-success' onclick="location.href='<?=base_url() ?>index.php/socdata/power/<?=$platform.'/'.$week.'/'.$device?>'" value='POWER EDIT'/>
<input type='button' class='btn btn-large btn-warning' style='margin-left: 50px;' onclick="location.href='<?=base_url() ?>index.php/socdata/target/<?=$platform.'/'.$device?>'" value='TARGET EDIT'/>
</center>

<hr>
<h2>POWER TRENDS</h2>

<div class='charts'>

<?php
foreach($cases as $case) :
?>
<div class='chart'>
<canvas id='<?=$case['case_name']?>_canvas' width='400' height='200'></canvas>
<div class='chart_title'><?=$case['case_name']?></div>
</div>


<script>
function <?=$case['case_name']?>_draw(){
var data = {
labels :[<?=$label_version?>],

datasets : [
{
fillColor: 'rgba(115,187,205, 0.5)',
strokeColor: 'rgba(115,187,205, 1)',
ponitColor: 'rgba(255,98,98, 1)',
pointStrokeColor: '#fff',
data: [<?=$power_arr[$case['case_name']];?> ]
}
]
}
if(window.G_vmlCanvasManager && window.attachEvent && !window.opera) {
    var canvas = window.G_vmlCanvasManager.initElement(document.getElementById('<?=$case['case_name']?>_canvas'));
    var ctx = canvas.getContext('2d');
}else{
    var ctx = document.getElementById('<?=$case['case_name']?>_canvas').getContext('2d');
}
new Chart(ctx).Line(data);
}
</script>
<?php
 endforeach;
?>
</div> <!-- charts end -->
</div>
<script>
window.onload = function() {
<?php foreach($cases as $case) : ?>
<?=$case['case_name']?>_draw();
<?php endforeach; ?>
}
</script>
