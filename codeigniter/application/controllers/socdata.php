<?php
class Socdata extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('socdata_model');
    }


    public function index() {
        $data['platform'] = $this->socdata_model->get_all_platform();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('socdata/index', $data);
    }

    public function get_version($platform, $device) {
        $version = $this->socdata_model->get_version($platform, $device);
        echo "<option value='0'>Choose</option>";
        foreach($version as $v) {
            echo "<option value='".$v['week']."'>".$v['week']."</option>";
        }
    }

    public function get_devices($platform) {
        $devices = $this->socdata_model->get_devices($platform);
        echo "<option value='0'>Choose</option>";
        foreach($devices as $dv) {
            echo "<option value='".$dv['device']."'>".$dv['device']."</option>";
        }
    }

    public function show() {
        $platform   = $this->input->post('platform');
        $week       = $this->input->post('version');
        $device     = $this->input->post('device');

        $data['cstate'] = $this->socdata_model->get_cstate($platform, $week, $device);
        $data['pstate'] = $this->socdata_model->get_pstate($platform, $week, $device);
        $data['ncstate'] = $this->socdata_model->get_ncstate($platform, $week, $device);
        $data['wakeups'] = $this->socdata_model->get_wakeups($platform, $week, $device);
        $data['fps'] = $this->socdata_model->get_fps($platform, $week, $device);
        $data['power'] = $this->socdata_model->get_power($platform, $week, $device);
        $data['cases'] = $this->socdata_model->get_cases($platform, $week, $device);
        $data['cores'] = $this->socdata_model->get_cores($platform, $week, $device);

        $data['title'] = 'SOCWATCH DATA';
        $data['device'] = $device;
        $data['platform'] = $platform;
        $data['week'] = $week;

        $data['cases_targets'] = $this->socdata_model->get_cases_targets($platform, $device);

        $version = $this->socdata_model->get_version($platform, $device);
        $last_v = array_pop($version);
        $data['label_version'] = "";
        foreach($version as $v) {
            $data['label_version'] .= "'".$v['week']."',";
        }
        $data['label_version'] .= "'".$last_v['week']."'";

        $cases = $this->socdata_model->get_cases($platform, $week, $device);
        foreach($cases as $case) {
            $data[$case['case_name'].'_power'] = $this->socdata_model->get_case_power($platform, $device, $case['case_name']);
            $data['power_arr'][$case['case_name']] = "";
            foreach($data[$case['case_name'].'_power'] as $data_case) {
                $data['power_arr'][$case['case_name']] .= $data_case['value'].",";
            }
            $data['power_arr'][$case['case_name']] .= $data_case['value'];
        }

        $yy_ww = explode("WW",$week);
        $yy = intval($yy_ww[0]);
        $ww = intval($yy_ww[1]);
        if(($ww-1) < 10){
            $ww = $yy.'WW0'.($ww-1);
        }else{
            $ww = $yy.'WW'.($ww-1);
        }

        $data['power_pre'] = $this->socdata_model->get_power($platform, $ww, $device);

        $this->load->helper('url');
        $this->load->view('socdata/header', $data);
        $this->load->view('socdata/show', $data);
        $this->load->view('socdata/footer', $data);

    }


    public function power($platform, $week, $device) {
        $data['device'] = $device;
        $data['platform'] = $platform;
        $data['week'] = $week;
        $data['cases'] = $this->socdata_model->get_cases($platform, $week, $device);
        $data['power'] = $this->socdata_model->get_power($platform, $week, $device);
        //$this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('socdata/power', $data);
    }


    public function updata_power($platform, $device, $week, $case_name, $value) {
        $sql = "SELECT * FROM `soc_data` WHERE `platform` = '$platform' AND `device` = '$device' AND `week`= '$week' AND `case_name` = '$case_name' AND `category`='power'";
        $this->db->query($sql);

        $category = 'power';
        $item_name = 'power';
        $core_num = 'core ALL';

        if($this->db->affected_rows() <= 0) {
        // NOT EXIST
            $datetime = date('Y-m-d H:i:s',time());
            $description = $week.'#'.$platform.'#'.$device.'#'.$category.'#'.$item_name.'#'.$case_name.'#'.$core_num;

            $sql = "INSERT INTO `soc_data` VALUES (NULL, '$platform', '$device', '$category', '$item_name', '$case_name', '$core_num', '$value', '$week', '$datetime', '$datetime', '$description')";

            $query =  $this->db->query($sql);

            if($this->db->affected_rows() <= 0) {
                echo "<div id='ret_msg' align='center' style='display:none;font-size:24px;font-weight:bold;color:red;'>INSERT WITH FAILURE</div>";
            }else {
                echo "<div id='ret_msg' align='center' style='display:none;font-size:24px;font-weight:bold;color:green;''>INSERT SUCCESSFULLY</div>";
            }
        }else {
            $datetime = date('Y-m-d H:i:s',time());
            $description = $week.'#'.$platform.'#'.$device.'#'.$category.'#'.$item_name.'#'.$case_name.'#'.$core_num;
            $sql = "UPDATE `soc_data` SET `value` = '$value', `updatetime` = '$datetime'  WHERE `description`= '$description' ";
            $this->db->query($sql);

            if($this->db->affected_rows() <= 0) {
                echo "<div id='ret_msg' align='center' style='display:none;font-size:24px; font-weight:bold;color:red;'>NOTHING UPDATA</div>";
            }else {
                echo "<div id='ret_msg' align='center' style='display:none;font-size:24px;font-weight:bold;color:green;'>UPDATA SUCCESSFULLY</div>";
            }
        }
    }


    public function target($platform, $device) {
        $data['target_cases'] = $this->socdata_model->get_target_cases($platform, $device);
        $data['cases_targets'] = $this->socdata_model->get_cases_targets($platform, $device);
        //print_r($data['cases_targets']);

        //print_r($data['target_cases']);
        $data['platform'] = $platform;
        $data['device'] = $device;

        $this->load->helper('url');
        $this->load->view('socdata/target', $data);
    }


    public function target_save($platform, $device, $case_name, $value) {
        $sql = "INSERT INTO `soc_target` VALUES(NULL, '$platform', '$device', '$case_name', '$value', CURRENT_TIMESTAMP,'')";
        $query = $this->db->query($sql);

        if($this->db->affected_rows() <= 0) {
            echo "<div id='ret_msg' align='center' style='display:none;font-size:24px;font-weight:bold;color:red;'>SAVE AS TARGET WITH FAILURE</div>";
        }else {
            echo "<div id='ret_msg' align='center' style='display:none;font-size:24px;font-weight:bold;color:green;'>SAVE AS TARGET SUCCESSFULLY</div>";
        }
    }

    public function settings() {
    
    }

}
