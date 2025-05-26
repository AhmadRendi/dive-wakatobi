<?php

session_start();

class Home extends Controller {

    public function index() {
        
        $data = $this->model('Testimonis')->getAllTestimonials();

        // $data = null;
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('home/index', $data);
        $this->view('template/Footer');
    }
}