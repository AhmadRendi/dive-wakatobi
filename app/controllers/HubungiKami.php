<?php
class HubungiKami extends Controller {
    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('hubungi_kami/index');
        $this->view('template/Footer');
    }
}

