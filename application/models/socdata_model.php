<?php
class Socdata_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_platform() {
        $this->db->select('platform');
        $this->db->distinct();
        $query = $this->db->get_where('soc_data');
        return $query->result_array();
    }

    public function get_devices($platform) {
        $this->db->select('device');
        $this->db->distinct();
        $query = $this->db->get_where('soc_data',array('platform'=>$platform));
        return $query->result_array();
    }

    public function get_version($platform, $device) {
        $this->db->select('week');
        $this->db->distinct();
        $query = $this->db->get_where('soc_data',array('platform'=>$platform, 'device'=>$device));
        return $query->result_array();
    }

    public function get_data($platform ="MRFLD", $week, $device) {
//        echo "Socdata_model get_data<br>";
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device));
        //return $query->row_array();
        return $query->result_array();
    }

    public function get_cstate($platform ="MRFLD", $week, $device) {
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device, 'category'=>'cstate'));
        return $query->result_array();
    }

    public function get_pstate($platform ="MRFLD", $week, $device) {
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device, 'category'=>'pstate'));
        return $query->result_array();
    }

    public function get_wakeups($platform ="MRFLD", $week, $device) {
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device, 'category'=>'wakeups'));
        return $query->result_array();
    }


    public function get_fps($platform ="MRFLD", $week, $device) {
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device, 'category'=>'fps'));
        return $query->result_array();
    }

    public function get_power($platform ="MRFLD", $week, $device) {
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device, 'category'=>'power'));
        return $query->result_array();
    }

    public function get_case_power($platform, $device, $casename) {
        $this->db->order_by('datetime', 'asc');
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'device'=>$device, 'case_name'=>$casename, 'category'=>'power'));
        return $query->result_array();
    }

    public function get_ncstate($platform ="MRFLD", $week, $device) {
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device, 'category'=>'ncstate'));
        return $query->result_array();

    }

    public function get_cases($platform ="MRFLD", $week, $device) {
        $this->db->select('case_name');
        $this->db->distinct();
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device));
        return $query->result_array();
    }

    public function get_cores($platform ="MRFLD", $week, $device) {
        $this->db->select('core_num');
        $this->db->distinct();
        $query = $this->db->get_where('soc_data', array('platform'=>$platform, 'week'=>$week, 'device'=>$device));
        return $query->result_array();
    }

    public function get_target_cases($platform, $device) {
        $query = $this->db->get_where('soc_settings', array('item' => 'case', 'platform'=>$platform, 'device' => $device));
        $target_cases = array();
        foreach($query->result_array() as $result) {
            array_push($target_cases,$result['value']);
        }
        return $target_cases;
    }

    public function get_cases_targets($platform, $device) {
        $target_cases = $this->get_target_cases($platform, $device);
        $cases_targets = array();

        foreach($target_cases as $tcase) {
            $this->db->order_by('datetime','desc');
            $this->db->limit(1);
            $query = $this->db->get_where('soc_target', array('platform' => $platform,'device' => $device, 'case_name'=>$tcase));
            $cases_targets[$tcase] = $query->row_array();
        }
        return $cases_targets;
    }

}
