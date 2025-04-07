<?php

session_start();

class Register extends Controller {

    private function models(){
        return $model = $this->model('Users');
    }

    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('register/index');
        $this->view('template/Footer');
    }

    private function validateEmail($email){
        $user = $this->models()->getUserByEmail($email);
        if(!empty($user)){
            throw new Exception("Email already registered");
        }
    }

    private function validateEmailFormat($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Invalid email format");
        }
    }

    private function validateName($name){

        if(empty($name)){
            throw new Exception("Name cannot be empty");
        }
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            throw new Exception("Name can only contain letters and spaces");
        }
        if(strlen($name) < 5){
            throw new Exception("Name must be at least 3 characters");
        }
        if(strlen($name) > 50){
            throw new Exception("Name cannot exceed 50 characters");
        }
    }

    private function validateUsername($username){

        if(empty($username)){
            throw new Exception("Name cannot be empty");
        }
        if(!preg_match("/^[a-zA-Z ]*$/", $username)){
            throw new Exception("Name can only contain letters and spaces");
        }
        if(strlen($username) < 5){
            throw new Exception("Name must be at least 3 characters");
        }
        if(strlen($username) > 50){
            throw new Exception("Name cannot exceed 50 characters");
        }
    }

    private function validatePassword($password, $confirmPassword){
        if($password !== $confirmPassword){
            throw new Exception("Passwords do not match");
        }
        if(strlen($password) < 8){
            throw new Exception("Password must be at least 8 characters");
        }
    }

    public function save(){
        header('Content-Type: application/json');
        try{
            $this->validateEmail($_POST['email']);
            $this->validateEmailFormat($_POST['email']);
            $this->validatePassword($_POST['password'], $_POST['confirmPassword']);
            $this->validateName($_POST['fullName']);
            $this->validateUsername($_POST['username']);
            $_POST['role'] = 'USER';
            $_POST['picture'] = 'image.png';
            $result = $this->models()->saveUser($_POST);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e) {
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}

