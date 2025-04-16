<?php

session_start();

class Login extends Controller {
    
    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('login/index');
        $this->view('template/Footer');
    }

    private function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    private function verification($email, $password){
        $model = $this->model('Users');
        $user = $model->getUserByEmail($email);
        if ($user) {
            $_SESSION['email'] = $user['email'];
            if ($this->verifyPassword($password, $user['password'])) {
                $_SESSION['picture'] = $user['picture'];
                return $user['role'];
            } else {
                throw new Exception("Password salah");
            }
        } else {
            throw new Exception("Email tidak terdaftar");
        }
    }

    public function session(){
        header('Content-Type: application/json');
        try{

            $data = $_POST['data'];
            $username = $data['username'];
            $password = $data['password'];

            $roleSession = $this->verification($username, $password);

            if($roleSession == "USER"){
                $_SESSION['user_role'] = "USER";
            }else if ($roleSession == "ADMIN"){
                $_SESSION['user_role'] = "ADMIN";
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

