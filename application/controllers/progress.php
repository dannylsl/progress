<?php
class Progress extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('progress_model');
    }


    public function index() {
        $data['events'] = $this->progress_model->get_events();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/header');
        $this->load->view('progress/index',$data);
    }


    public function done() {
        $data['events'] = $this->progress_model->get_events_done();
        $data['done'] = True;

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/header');
        $this->load->view('progress/done',$data);
    }

    public function report() {
        $data['start_week'] = $this->progress_model->get_start_week();
        $data['cur_week'] = $this->progress_model->get_current_week();
        //$data['']
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/header');
        $this->load->view('progress/report',$data);
    }

    public function report_detail($week) {
        
    }


    public function addtodo($eId = 0) {
        $this->load->helper('url');
        $this->load->helper('form');

        $data['categorys'] = $this->progress_model->get_categorys();

        if(isset($eId) && $eId != 0) {
            $data['edit'] = True;
            $data['event'] = $this->progress_model->get_event($eId);
        }

        $this->load->view('progress/addtodo', $data);
    }


    public function save_event() {
        $this->load->helper('url');
        $title = $this->input->post('title');
        $result = $this->progress_model->add_event();
        if(0 == $result) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Event";  // Setting | Event | Comment
            $obj_name = $title;
            $action_type = "ADD"; // ADD | EDIT | DEL
            $action = "Add a new Event";
            $url = "index.php/progress/detail/".$result;

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $result);
            header("Location:".base_url()."index.php");
        };
    }


    public function update_event() {
        $this->load->helper('url');
        $eId = $this->input->post('eId');
        $title = $this->input->post('title');

        if(0 == $this->progress_model->update_event() ) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Event";  // Setting | Event | Comment
            $obj_name = $title;
            $action_type = "EDIT"; // ADD | EDIT | DEL
            $action = "Edit Event";
            $url = "index.php/progress/detail/".$eId;

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $eId);
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }


    public function delete_event($eId) {
        $this->load->helper('url');
        $event = $this->progress_model->get_event($eId);
        if(0 == $this->progress_model->delete_event($eId) ) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Event";  // Setting | Event | Comment
            $obj_name = $event['title'];
            $action_type = "DEL"; // ADD | EDIT | DEL
            $action = "Delete Event";
            $url = "index.php/progress/detail/".$eId;

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $eId);
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }


    public function finish_event($eId) {
        $this->load->helper('url');
        $event = $this->progress_model->get_event($eId);
        if(0 == $this->progress_model->finish_event($eId) ) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Event";  // Setting | Event | Comment
            $obj_name = $event['title'];
            $action_type = "FINISHED"; // ADD | EDIT | DEL
            $action = "Finished Event";
            $url = "index.php/progress/detail/".$eId;

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $eId);
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }

    public function detail($eId) {
        $data['event'] = $this->progress_model->get_event($eId);
        $data['comments'] = $this->progress_model->get_comments($eId);

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/header');
        $this->load->view('progress/detail', $data);
    }

    public function add_comment() {
        $this->load->helper('url');
        $eId = $this->input->post('eId');
        $e_title = $this->input->post('e_title');
        $comment = $this->input->post('comment');
        if($comment == "") {
            header("Location:".base_url()."index.php/progress/detail/".$eId);
            return;
        }

        $cId = $this->progress_model->add_comment();
        if(0 == $cId) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Comment";  // Setting | Event | Comment
            $obj_name = $e_title;
            $action_type = "ADD"; // ADD | EDIT | DEL
            $action = "new a comment";
            $url = "index.php/progress/detail/".$eId."#comment-".$cId;

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $cId);

            header("Location:".base_url()."index.php/progress/detail/".$eId."#comment-".$cId);
        };
    }

    public function edit_comment($eId, $cId){
        $data['event'] = $this->progress_model->get_event($eId);
        $data['comments'] = $this->progress_model->get_comments($eId);

        $data['comment'] = $this->progress_model->get_comment($cId);
//        echo $data['comment']['comment'];
//        $data['comment']['comment'] = stripcslashes($data['comment']['comment']);
//        echo $data['comment']['comment'];
        $data['edit'] = True;

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/header');
        $this->load->view('progress/detail', $data);
    }


    public function update_comment() {
        $this->load->helper('url');
        $eId = $this->input->post('eId');
        $e_title = $this->input->post('e_title');
        $cId = $this->input->post('cId');

        if(0 == $this->progress_model->update_comment() ) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Comment";  // Setting | Event | Comment
            $obj_name = $e_title;
            $action_type = "EDIT"; // ADD | EDIT | DEL
            $url = "index.php/progress/detail/".$eId."#comment-".$cId;
            $action = "Edit Comment to Event";

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $cId);

            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }


    public function delete_comment($eId, $cId) {
        $this->load->helper('url');
        $event = $this->progress_model->get_event($eId);

        if(0 == $this->progress_model->delete_comment($cId) ) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Comment";  // Setting | Event | Comment
            $obj_name = $event['title'];
            $action_type = "DEL"; // ADD | EDIT | DEL
            $action = "Delete comment in Event";
            $url = "index.php/progress/detail/".$eId."#comment-".$cId;

            $this->progress_model->history_add($uId, $uname, $obj_type,$obj_name, $action_type, $action, $url, $cId);
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        }
    }

    public function settings() {
        $this->load->helper('url');
        $this->load->helper('form');

        $data['categorys'] = $this->progress_model->get_categorys();

        $this->load->view('progress/header');
        $this->load->view('progress/settings', $data);
    }


    public function add_category() {
        $this->load->helper('url');
        $item_value = $this->input->post('item_name');
        $result = $this->progress_model->add_category($item_value);
        if( 0 == $result) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Setting";  // Setting | Event | Comment
            $obj_name = 'Category';
            $action_type = "ADD"; // ADD | EDIT | DEL
            $action = "new Category [{$item_value}] in Settings";
            $url = "index.php/progress/settings";

            $this->progress_model->history_add($uId, $uname, $obj_type, $obj_name, $action_type, $action, $url, $result);
            header("Location:".base_url()."index.php/progress/settings");
        };
    }

    public function remove_category($id) {
        $this->load->helper('url');
        $category = $this->progress_model->get_category($id);
        if( 0 == $this->progress_model->remove_category($id)) {
            echo "FAIL TO ADD EVENT";
        }else {
            $uId = 1;
            $uname = "Danny Lee";
            $obj_type = "Setting";  // Setting | Event | Comment
            $obj_name = 'Category';
            $action_type = "DEL"; // ADD | EDIT | DEL
            $action = "delete Category [{$category['value']}] in Settings";
            $url = "index.php/progress/settings";

            $this->progress_model->history_add($uId, $uname, $obj_type,$obj_name, $action_type, $action, $url, $id);
            header("Location:".base_url()."index.php/progress/settings");
        };
    }
/*
    public function e_title_match() {
        $query = $this->db->get_where('prog_comments');
        $comments = $query->result_array();
        foreach($comments as $c) {
            echo $c['eId']."<br>";
            $query = $this->db->get_where('prog_events', array('id'=>$c['eId']));
            $event = $query->row_array();
            //print_r($event);
            $data = array('e_title'=>$event['title']);
            $this->db->where('id', $c['id']);
            $this->db->update('prog_comments', $data);
        }
    }
*/

    public function history() {
        $this->load->helper('url');

        $data['logs'] = $this->progress_model->get_history_logs();

        $this->load->view('progress/header');
        $this->load->view('progress/history', $data);
    }

    public function login() {
        $this->load->helper('url');

        $this->load->view('progress/login');
    }

    public function register() {
        $this->load->helper('url');
        $this->load->view('progress/register');
    }

    public function newuser() {

    }

    public function uname_check($username) {
       if($this->progress_model->is_uname_exist($username)) {
            echo '1';
          //  echo "<span class='ajax_span' id='uname_span' style='red'>EXIST</span>";
       }else{
            echo '0';
          //  echo "<span class='ajax_span' id='uname_span' style='color:green'>Available</span>";
       }
    }

}
