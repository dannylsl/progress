<?php
class Progress_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_event() {

        $id = NULL;
        $title = addslashes($this->input->post('title'));
        $category = addslashes($this->input->post('category'));
        $description = addslashes($this->input->post('description'));
        $uId = 1;
        $username = '';
        $starttime = date('Y-m-d H:i:s',time());
        $endtime = '0000-00-00 00:00:00';
        $status = 1;
        $note = '';

        $sql = "INSERT INTO `prog_events` VALUES(NULL, '$title', '$category', '$description', '$uId', '$username', '$starttime', '$endtime', '$status', '$note')";

        $query =  $this->db->query($sql);

        return $this->db->insert_id('id');
/*
        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
*/
    }


    public function update_event() {

        $eId = $this->input->post('eId');
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $description = $this->input->post('description');

        $data = array('title'=> $title, 'category'=> $category, 'description'=> $description);
        $this->db->where('id', $eId);
        $this->db->update('prog_events', $data);
        //echo "Last Query:". $this->db->last_query();

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }


    public function delete_event($eId) {

        $data = array('status'=> 0 );
        $this->db->where('id', $eId);
        $this->db->update('prog_events', $data);
        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }


    public function finish_event($eId) {

        $date = date('Y-m-d H:i:s',time());
        $data = array('status'=> 2, 'end_date' => $date );
        $this->db->where('id', $eId);
        $this->db->update('prog_events', $data);
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


    public function get_events_done() {
        $this->db->order_by('end_date', 'DESC');
        $query = $this->db->get_where('prog_events',array('status'=>2)); //status == finished
        return $query->result_array();
    }


    public function get_event($eId) {
        $query = $this->db->get_where('prog_events',array('id'=>$eId)); //status == on-going
        return $query->row_array();
    }


    public function add_comment() {
        $eId = $this->input->post('eId');
        $e_title = $this->input->post('e_title');
        $u1id = '1';
        $u1name = 'Danny Lee';
        $comment = $this->input->post('comment');
        $comment = addslashes($comment);
        $status = 1;
        $date = date('Y-m-d H:i:s',time());

        $sql = "INSERT INTO `prog_comments` VALUES(NULL, '$eId', '$e_title', '$u1id', '$u1name', '$comment', '$status', '$date')";

        $query =  $this->db->query($sql);
        return $this->db->insert_id('id');
/*
        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
*/
    }


    public function get_comments($eId) {
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get_where('prog_comments', array('eId' => $eId, 'status'=>1));
        return $query->result_array();
    }


    public function get_comment($cId) {
        $query = $this->db->get_where('prog_comments', array('id' => $cId));
        return $query->row_array();
    }


    public function update_comment() {
        $cId = $this->input->post('cId');
        $comment = $this->input->post('comment');
//        $comment = addslashes($comment);

        $data = array('comment'=>$comment);
        $this->db->where('id', $cId);
        $this->db->update('prog_comments', $data);
//        echo $this->db->last_query();;

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }


    public function delete_comment($cId) {

        $data = array('status'=> 0 );
        $this->db->where('id', $cId);
        $this->db->update('prog_comments', $data);

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }


    public function get_categorys() {
        $this->db->order_by('datetime', 'ASC');
        $query = $this->db->get_where('prog_settings',array('item'=>'category'));
        return $query->result_array();
    }


    public function get_category($id) {
        $query = $this->db->get_where('prog_settings', array('id'=>$id));
        return $query->row_array();
    }


    public function add_category($item_value) {
        $date = date('Y-m-d H:i:s',time());
        $item = "category";
        $note = '';

        $data = array('item'=>$item, 'value'=>$item_value, 'datetime'=> $date, 'note'=>$note);

        $this->db->insert('prog_settings', $data);
        return $this->db->insert_id('id');
/*
        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
*/
    }


    public function remove_category($id) {

        $this->db->delete('prog_settings', array('id'=>$id));

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }


    public function history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $rId) {

        $datetime = date('Y-m-d H:i:s',time());
        $data = array('userId'=> $uId, 'username'=>$uname, 'obj_type'=>$obj_type, 'obj_name'=>$obj_name, 'action_type'=> $action_type, 'action'=>$action, 'url'=> $url, 'datetime'=>$datetime, 'rId'=>$rId);

        $this->db->insert('prog_history', $data);

        if($this->db->affected_rows() <= 0) {
            return 0; // failed
        }else {
            return 1; // success
        }
    }

    public function get_history_logs() {
        $this->db->order_by('datetime', 'DESC');
        $query = $this->db->get_where('prog_history');
        return $query->result_array();

    }

    /*************  REPORT RELATED  *******************/
    public function get_start_week() {
        $this->db->order_by('start_date', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get_where('prog_events');
        $event = $query->row_array();
        //print_r($event);
        $start = array();
        $start['year'] = intval(date('Y',strtotime($event['start_date'])));
        $start['week'] = intval(date('W',strtotime($event['start_date'])));
        return $start;
    }
    public function get_current_week() {
        $cur = array();
        $cur['year'] = intval(date('Y',strtotime(date('Y-m-d'))));
        $cur['week'] = intval(date('W',strtotime(date('Y-m-d'))));
        return $cur;
    }


    public function get_week_startend($year, $weekno) {
        $year_start_date = $year.'-01-01';
        $year_start_date_w = date('w',strtotime($year_start_date)); //day number in a week

        if($weekno == 0) {
            return 0;
        }else if($weekno == 1) {
            $week['start'] = $year_start_date;
            if($year_start_date_w == 0){
                $week['end'] = $year_start_date;
            }else {
                $week['end'] = $year.'-01-'.(8-$year_start_date_w);
            }
        }else {
            if($year_start_date_w == 0){
                $ww1_end = $year_start_date;
            }else {
                $ww1_end = $year.'-01-'.(8-$year_start_date_w);
            }
            $ww2_start = date('Y-m-d',strtotime('+1 day',strtotime($ww1_end)));
            $week['start'] = date('Y-m-d',strtotime('+'.($weekno-2).' week',strtotime($ww2_start)));
            $week['end'] = date('Y-m-d',strtotime('+6 day',strtotime($week['start'])));
        }
        return $week;
    }

    public function is_uname_exist($username) {
        $query = $this->db->get_where('prog_users', array('username' => $username));
        $user = $query->row_array();

        if(empty($user)) {
            return false;
        }else{
            return true;
        }

    }
}
