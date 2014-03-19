<?php
class Progress_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_event() {
        $this->load->helper('url');

        $id = NULL;
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $description = $this->input->post('description');
        $uId = 1;
        $username = '';
        $starttime = date('Y-m-d H:i:s',time());
        $endtime = '0000-00-00 00:00:00';
        $status = 1;
        $note = '';

        $sql = "INSERT INTO `prog_events` VALUES(NULL, '$title', '$category', '$description', '$uId', '$username', '$starttime', '$endtime', '$status', '$note')";

        $query =  $this->db->query($sql);
        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }

    public function get_events() {
        $this->db->order_by('start_date', 'DESC');
        $query = $this->db->get_where('prog_events',array('status'=>1)); //status == on-going
        return $query->result_array();
    }

    public function get_event($eId) {
        $query = $this->db->get_where('prog_events',array('id'=>$eId)); //status == on-going
        return $query->result_array();
    }

}
