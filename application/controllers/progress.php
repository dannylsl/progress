<?php
class Progress extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('progress_model');
    }

    public function index() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('progress/index');
    }

    public function add_event() {
        
    }

}
