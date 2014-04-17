<div class='container'>
<h1>history</h1>
<div class='log_list'>


    <?
    $datetime = "";
    foreach($logs as $log) :
    ?>
    <?
    $datetime_arr = explode(' ', $log['datetime']);
    if($datetime == '' || $datetime != $datetime_arr[0]){
        echo "<div class='day'>$datetime_arr[0]</div>";
        $datetime = $datetime_arr[0];
    }
    ?>
    <?
     switch($log['obj_type']){
        case 'Event':
            $ext_class = 'event_log';
            break;
        case 'Setting':
            $ext_class = 'setting_log';
            break;
        case 'Comment':
            $ext_class = 'comment_log';
            break;
     }
    ?>
    <div class='log_item <?=$ext_class?>'>
        <div class='img-box'>
            <?
            switch($log['action_type']) {
                case 'ADD':
                    $img = 'add.png';
                    break;
                case 'DEL':
                    $img = 'del.png';
                    break;
                case 'EDIT':
                    $img = 'edit.png';
                    break;
                case 'FINISHED':
                    $img = 'checked.png';
                    break;
            }
            ?>
            <img src='<?=base_url()?>images/<?=$img?>' />
        </div>
        <div class='time'><?=$datetime_arr[1]?></div>
        <div class='content'>
        <?
        switch($log['obj_type']){
            case 'Event':
                $url = base_url().$log['url'];
                echo $log['username'].' '.$log['action']." [ <a href='$url' target='_blank'>".$log['obj_name']."</a> ]";
                break;
            case 'Setting':
                $url = base_url().$log['url'];
                echo $log['username'].' '.$log['action'];
                break;
            case 'Comment':
                $url = base_url().$log['url'];
                echo $log['username'].' '.$log['action']." [ <a href='$url' target='_blank'>".$log['obj_name']."</a> ]";
                break;
        }
        ?>
        </div>
    </div>
    <? endforeach ?>


</div> <!-- log_list end -->
</div> <!-- container end -->
