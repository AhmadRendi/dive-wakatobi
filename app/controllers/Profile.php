<?php

session_start();

class Profile extends Controller {

    public function index() {
        if($_SESSION['user_role'] == 'ADMIN' || $_SESSION['user_role'] == 'USER'){

            $data = $this->models()->getUserByEmail($_SESSION['email']);
            if ($data['noTelepon'] == null) {
                $data['noTelepon'] = 'Belum ada nomor telepon';
            }
            $_SESSION['picture'] = $data['picture'];
            $this->view('template/Header'); 
            $this->view('template/Sidebar');
            $this->view('profile/index', $data);
            $this->view('template/Footer');
        }else {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
        
    }

    public function models(){
        return $this->model('Users');
    }

    public function getProfile(){
        header('Content-Type: application/json');
        try{
            $data = $this->models()->getUserByEmail($_SESSION['email']);
            if($data['noTelepon'] == null) {
                $data['noTelepon'] = 'Belum ada nomor telepon';
            }
            echo json_encode(array('status' => 'error', 'data' => $data));
            // echo json_encode($data);
        }catch (Exception $e){
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }

    private function uploadImage($file) {
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileTmp = $file['tmp_name'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
    
        // Tentukan folder tujuan
        $folderDestination =  '../public/img/asset/';

        if(!is_dir($folderDestination)){
            throw new Exception('Directory is not found ' . $folderDestination);
        }

        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = $folderDestination . $fileNameNew;
    
        $allowed = ['jpg', 'jpeg', 'png'];
    
        // Validasi ekstensi file
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    // Validasi apakah direktori tujuan ada, jika tidak ada, buat direktori
                    if (!is_dir($folderDestination)) {
                        if (!mkdir($folderDestination, 0755, true)) {
                            throw new Exception('Cannot create directory: ' . $folderDestination);
                        }
                    }
    
                    // Debug: Periksa apakah file temporary ada
                    if (!file_exists($fileTmp)) {
                        throw new Exception('Temporary file does not exist: ' . $fileTmp);
                    }
    
                    // Pindahkan file ke direktori tujuan
                    if (move_uploaded_file($fileTmp, $fileDestination)) {
                        return $fileNameNew;
                    } else {
                        throw new Exception('Failed to move uploaded file. Check permissions and path. Destination: ' . $fileDestination);
                    }
                } else {
                    throw new Exception('Your file is too big');
                }
            } else {
                throw new Exception('There was an error uploading your file');
            }
        } else {
            throw new Exception('You cannot upload files of this type');
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

    public function updateProfile(){
        header('Content-Type: application/json');
        try{
            $data = $_POST;
            $file = $_FILES['picture'];
            $email = $_SESSION['email'];
            $fileName = null;

            $this->validateName($data['namaLengkap']);

            if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
                $fileName = $this->uploadImage($file);
            }
            $result = $this->models()->updateUserByEmail($email, $data, $fileName);
            echo json_encode(array('status' => 'success', 'message' => $result));
        }catch (Exception $e){
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }
}