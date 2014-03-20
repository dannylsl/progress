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

    public function add_comment() {
        $eId = $this->input->post('eId');
        $u1id = '1';
        $u1name = 'Danny Lee';
        $comment = $this->input->post('comment');
        $status = 1;
        $date = date('Y-m-d H:i:s',time());

        $sql = "INSERT INTO `prog_comments` VALUES(NULL, '$eId', '$u1id', '$u1name', '$comment', '$status', '$date')";

        $query =  $this->db->query($sql);
        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }

    public function get_comments($eId) {
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get_where('prog_comments', array('eId' => $eId));
        return $query->result_array();
    }

    public function get_categorys() {
        $this->db->order_by('datetime', 'ASC');
        $query = $this->db->get_where('prog_settings',array('item'=>'category'));
        return $query->result_array();
    }

    public function add_category($item_value) {
        $date = date('Y-m-d H:i:s',time());
        $item = "category";
        $note = '';

        $data = array('item'=>$item, 'value'=>$item_value, 'datetime'=> $date, 'note'=>$note);

        $this->db->insert('prog_settings', $data);

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }

    }

    public function remove_category($id) {

        $this->db->delete('prog_settings', array('id'=>$id));

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }

    }

}
