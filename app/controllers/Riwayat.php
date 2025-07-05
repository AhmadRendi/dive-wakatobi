<?php

session_start();

class Riwayat extends Controller {

    public function index() {
        if($_SESSION['user_role'] == 'USER'){

            $data = $this->model('Booking')->getPesananByEmail($_SESSION['email']);

            $this->view('template/Header');
            $this->view('template/Sidebar');
            $this->view('riwayat/index', $data);
            $this->view('template/Footer');
            exit;
        }else {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function batalPesanan(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];

            $result = $this->model('Booking')->batalPesananById($id);

            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
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

        if($fileName == ''){
            throw new Exception('File tidak boleh kosong');
        }
    
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    if (!is_dir($folderDestination)) {
                        if (!mkdir($folderDestination, 0755, true)) {
                            throw new Exception('Cannot create directory: ' . $folderDestination);
                        }
                    }
    
                    if (!file_exists($fileTmp)) {
                        throw new Exception('Temporary file does not exist: ' . $fileTmp);
                    }
    
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

    public function checkMetodePembayaran($metode){
        if($metode == null || $metode == ''){
            throw new Exception('Metode pembayaran tidak boleh kosong');
        }

    }

    public function bayarPesanan(){
        header('Content-Type: application/json');
        try{
            $data = $_POST;
            // $file = $_FILES['foto'];

            $file = $this->uploadImage($_FILES['foto']);
            
            $this->checkMetodePembayaran($data['metodePembayaran']);

            $result = $this->model('Payment')->savePembayaran($data, $file);


            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}