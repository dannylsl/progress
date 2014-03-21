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
        if(0 == $this->progress_model->add_event()) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php");
        };
    }


    public function update_event() {
        $this->load->helper('url');
        $eId = $this->input->post('eId');

        if(0 == $this->progress_model->update_event() ) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }


    public function delete_event($eId) {
        $this->load->helper('url');
        if(0 == $this->progress_model->delete_event($eId) ) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }


    public function finish_event($eId) {
        $this->load->helper('url');
        if(0 == $this->progress_model->finish_event($eId) ) {
            echo "FAIL TO ADD EVENT";
        }else {
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
        $eId =  $this->input->post('eId');
        if(0 == $this->progress_model->add_comment()) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }

    public function edit_comment($eId, $cId){
        $data['event'] = $this->progress_model->get_event($eId);
        $data['comments'] = $this->progress_model->get_comments($eId);

        $data['comment'] = $this->progress_model->get_comment($cId);
        $data['edit'] = True;

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/header');
        $this->load->view('progress/detail', $data);
    }


    public function update_comment() {
        $this->load->helper('url');
        $eId = $this->input->post('eId');
        $cId = $this->input->post('cId');

        if(0 == $this->progress_model->update_comment() ) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php/progress/detail/".$eId);
        };
    }


    public function delete_comment($eId, $cId) {
        $this->load->helper('url');

        if(0 == $this->progress_model->delete_comment($cId) ) {
            echo "FAIL TO ADD EVENT";
        }else {
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

        if( 0 == $this->progress_model->add_category($item_value)) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php/progress/settings");
        };
    }

    public function remove_category($id) {
        $this->load->helper('url');

        if( 0 == $this->progress_model->remove_category($id)) {
            echo "FAIL TO ADD EVENT";
        }else {
            header("Location:".base_url()."index.php/progress/settings");
        };


    }

}
