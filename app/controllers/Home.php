<?php

session_start();

class Home extends Controller {

    public function index() {
        
$data = [
    'testimonials' => $this->model('Testimonis')->getAllTestimonials(),
    'penyelam' => $this->model('Packet')->getPaket(),
    'kursus' => $this->model('Packet')->getPaketKursus()
];

$this->view('template/Header');
$this->view('template/Sidebar');
$this->view('home/index', $data);
$this->view('template/Footer');
    }
}