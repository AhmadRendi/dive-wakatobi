<?php

session_start();

class Login extends Controller {
    
    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('login/index');
        $this->view('template/Footer');
    }

    public function session(){
        $_SESSION['user_role'] = "USER";
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('dashboard/index');
        $this->view('template/Footer');
    }

    public function logout(){
        session_destroy();
        $_SESSION['user_role'] = null;
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('home/index');
        $this->view('template/Footer');
    }

}

