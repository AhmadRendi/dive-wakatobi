<?php


class Register extends Controller {
    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('register/index');
        $this->view('template/Footer');
    }
    
    // public function process() {
    //     if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Process registration data
    //         $fullName = trim($_POST['fullName']);
    //         $email = trim($_POST['email']);
    //         $username = trim($_POST['username']);
    //         $password = trim($_POST['password']);
    //         $confirmPassword = trim($_POST['confirmPassword']);
            
    //         // Validate registration data
    //         if(empty($fullName) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
    //             // Redirect back with error
    //             header('Location: ' . BASE_URL . 'register');
    //             exit;
    //         }
            
    //         if($password !== $confirmPassword) {
    //             // Redirect back with error
    //             header('Location: ' . BASE_URL . 'register');
    //             exit;
    //         }
            
    //         // Register user
    //         // ...
            
    //         // Redirect to login page
    //         header('Location: ' . BASE_URL . 'login');
    //         exit;
    //     } else {
    //         // Redirect to registration page
    //         header('Location: ' . BASE_URL . 'register');
    //         exit;
    //     }
    // }
}

