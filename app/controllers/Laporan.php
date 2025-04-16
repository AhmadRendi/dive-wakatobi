<?php

session_start();

class Laporan extends Controller {

    public function index(){

        if($_SESSION['user_role'] == "ADMIN"){
            $data = $this->model('Booking')->getLaporan();
            $this->view('template/Header');
            $this->view('template/Sidebar');
            $this->view('laporan/index', $data);
            $this->view('template/Footer');
        }else {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }
}