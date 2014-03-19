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
        $this->load->view('progress/index',$data);
    }

    public function addtodo() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/addtodo');
    }

    public function save_event() {
        if(0 == $this->progress_model->add_event()) {
            echo "FAIL TO ADD EVENT"; //$this->load->view('progress/index');
        }else {
            $this->index();
        };
    }

    public function detail($eId) {
        $data['event'] = $this->progress_model->get_event($eId);

        $this->load->helper('url');
        $this->load->view('progress/detail', $data);
    }

}
