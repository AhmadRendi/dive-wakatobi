<?php


session_start();

class Paket extends Controller {


    public function index(){

        // $data = [
        //         [
        //             'namaPaket' => 'Paket A',
        //             'deskripsi' => 'Paket A adalah paket yang paling murah',
        //             'harga' => 'Rp. 1.000.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket B',
        //             'deskripsi' => 'Paket B adalah paket yang paling mahal',
        //             'harga' => 'Rp. 2.000.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket C',
        //             'deskripsi' => 'Paket C adalah paket yang paling menarik',
        //             'harga' => 'Rp. 1.500.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket D',
        //             'deskripsi' => 'Paket D adalah paket yang paling seru',
        //             'harga' => 'Rp. 1.750.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket E',
        //             'deskripsi' => 'Paket E adalah paket yang paling menantang',
        //             'harga' => 'Rp. 1.250.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket F',
        //             'deskripsi' => 'Paket F adalah paket yang paling berkesan',
        //             'harga' => 'Rp. 1.800.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket G',
        //             'deskripsi' => 'Paket G adalah paket yang paling menyenangkan',
        //             'harga' => 'Rp. 1.600.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket H',
        //             'deskripsi' => 'Paket H adalah paket yang paling mengesankan',
        //             'harga' => 'Rp. 1.900.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket I',
        //             'deskripsi' => 'Paket I adalah paket yang paling menghibur',
        //             'harga' => 'Rp. 1.300.000'
        //         ],
        //         [
        //             'namaPaket' => 'Paket J',
        //             'deskripsi' => 'Paket J adalah paket yang paling menyegarkan',
        //             'harga' => 'Rp. 1.700.000'
        //         ],
        // ];

        $data = $this->models()->getPaket();

        try{
            $this->view('template/Header');
            $this->view('template/Sidebar');
            $this->view('paket/index', $data);
            $this->view('template/Footer');
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
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
                'waktu' => $_POST['waktu'],
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
            $id = $_POST['id'];
            $result = $this->models()->deletePaket($id);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}