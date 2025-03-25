<?php
class Home extends Controller {

    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('home/index');
        $this->view('template/Footer');
    }
}