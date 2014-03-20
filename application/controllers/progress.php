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


    public function addtodo() {
        $this->load->helper('url');
        $this->load->helper('form');

        $data['categorys'] = $this->progress_model->get_categorys();

        $this->load->view('progress/addtodo', $data);
    }


    public function save_event() {
        $this->load->helper('url');
        if(0 == $this->progress_model->add_event()) {
            echo "FAIL TO ADD EVENT"; //$this->load->view('progress/index');
        }else {
            header("Location:".base_url()."index.php");
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
