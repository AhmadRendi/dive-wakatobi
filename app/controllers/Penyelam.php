<?php

session_start();

class Penyelam extends Controller
{
    public function index()
    {
        // $data = $this->model('PenyelamModel')->getAllPackages();
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('penyelaman/index', $data);
        $this->view('template/Footer');
    }
}