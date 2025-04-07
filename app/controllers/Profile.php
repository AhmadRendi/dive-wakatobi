<?php

session_start();

class Profile extends Controller {

    public function index() {
        // $_SESSION['user_role'] = "USER";
        $data = [
                'fullName' => 'Nama Admin',
                'email' => 'admin@email.com',
                'nmrTelepon' => '082222222222',
        ];
        
        $this->view('template/Header'); 
        $this->view('template/Sidebar');
        $this->view('profile/index', $data);
        $this->view('template/Footer');
    }
}