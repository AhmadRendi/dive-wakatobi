<?php


session_start();

class Paket extends Controller {


    public function index(){

        if($_SESSION['user_role'] == 'ADMIN' || $_SESSION['user_role'] == 'USER'){
            try{
                $data = $this->models()->getPaket();
                $this->view('template/Header');
                $this->view('template/Sidebar');
                $this->view('paket/index', $data);
                $this->view('template/Footer');
            }catch (Exception $e){
                echo json_encode(['status' => 'error','message' => $e->getMessage()]);
            }
        }else {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }

    private function models(){
        return $this->model('Packet');
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

    private function validatePaket($data){
        if(empty($data['namaPaket'])){
            throw new Exception("Nama Paket tidak boleh kosong");
        }
        if(empty($data['deskripsi'])){
            throw new Exception("Deskripsi tidak boleh kosong");
        }
        if(empty($data['harga'])){
            throw new Exception("Harga tidak boleh kosong");
        }
    }

    private function validateName($name){
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $name)){
            throw new Exception("Nama Paket tidak boleh mengandung simbol");
        }
    }

    private function validateDeskripsi($deskripsi){
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $deskripsi)){
            throw new Exception("Deskripsi tidak boleh mengandung simbol");
        }
    }
    private function validateHarga($harga){
        if(!preg_match("/^[0-9]*$/", $harga)){
            throw new Exception("Harga tidak boleh mengandung simbol");
        }
    }

    public function savePaketNyelam(){
        header('Content-Type: application/json');
        try{
            $data = [
                'namaPaket' => $_POST['namaPaket'],
                'deskripsi' => $_POST['deskripsi'],
                'harga' => $_POST['harga'],
                'paket' => 'PENYELAM',
                'lokasi' => $_POST['lokasi'],
            ];

            $file = $this->uploadImage($_FILES['foto']);

            $this->validatePaket($data);
            $this->validateName($data['namaPaket']);
            $this->validateDeskripsi($data['deskripsi']);
            $this->validateHarga($data['harga']);

            $result = $this->models()->savePaket($data, $file);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    public function savePaketKursus(){
        header('Content-Type: application/json');
        try{
            $data = [
                'namaPaket' => $_POST['namaPaket'],
                'deskripsi' => $_POST['deskripsi'],
                'harga' => $_POST['harga'],
                'paket' => 'KURSUS',
                'lokasi' => $_POST['lokasi'],
            ];

            $file = $this->uploadImage($_FILES['foto']);

            $this->validatePaket($data);
            $this->validateName($data['namaPaket']);
            $this->validateDeskripsi($data['deskripsi']);
            $this->validateHarga($data['harga']);

            $result = $this->models()->savePaket($data, $file);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    public function getPaket(){
        header('Content-Type: application/json');
        try{
            $result = $this->models()->getPaket();
            echo json_encode(['status' => 'success','data' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    public function getPaketById(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $result = $this->models()->getPaketById($id);
            echo json_encode(['status' => 'success','data' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    public function deletePaket(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['idDelete'];
            $result = $this->models()->deletePaket($id);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    public function updatePaket(){
        header('Content-Type: application/json');
        try{
            $data = [
                'id' => $_POST['id'],
                'namaPaket' => $_POST['editNamaPaket'],
                'deskripsi' => $_POST['editDeskripsi'],
                'harga' => $_POST['editHarga'],
                'lokasi' => $_POST['editLokasi'],
            ];

            $this->validateName($data['namaPaket']);
            $this->validateDeskripsi($data['deskripsi']);
            $this->validateHarga($data['harga']);

            $result = $this->models()->updatePaket($data);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}