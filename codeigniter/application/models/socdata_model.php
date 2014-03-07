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
}
