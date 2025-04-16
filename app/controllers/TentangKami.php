<?php

session_start();

class TentangKami extends Controller {
    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('tentang_kami/index');
        $this->view('template/Footer');
    }
}

