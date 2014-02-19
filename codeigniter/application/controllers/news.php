<?php
class News extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index() {
        echo "News Object action: index<br>";
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'NEWS ARCHIVE';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($slug) {
        echo "News Object action: view<br>";
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>
