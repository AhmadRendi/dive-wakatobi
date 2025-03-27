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
        header('Content-Type: application/json');
        try{
            $data = $_POST['data'];
            $username = $data['username'];
            $password = $data['password'];

            if($username == "user" && $password == "user"){
                $_SESSION['user_role'] = "USER";
            }else if ($username == "admin" && $password == "admin"){
                $_SESSION['user_role'] = "ADMIN";
    
            }else {
                throw new Exception("Username atau password salah");
            }
            
            echo json_encode(['status' => 'success', 'role' => $_SESSION['user_role']]);
        }catch (Exception $e){
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
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

