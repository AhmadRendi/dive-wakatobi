<?php

session_start();

class Profile extends Controller {

    public function index() {
        // $_SESSION['user_role'] = "USER";
        $data = [
            'admin' => [
                'fullName' => 'Nama Admin',
                'email' => 'admin@email.com',
                'username' => 'admin123'
            ]
        ];
        
        $this->view('template/Header'); 
        $this->view('template/Sidebar');
        $this->view('profile/index', $data);
        $this->view('template/Footer');
    }
}