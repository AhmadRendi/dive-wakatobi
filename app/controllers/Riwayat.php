<?php

session_start();

class Riwayat extends Controller {


    private $data = [
        [
            'namaPaket' => 'Kursus A',
            'tanggalPemesanan' => '2023-10-01',
            'status' =>  "Menunggu Pembayaran",
            'harga' =>  1000000,
            'namaLenkap' => 'John Doe',
            'jmlPeserta' => 2,

        ],
        [
            'namaPaket' => 'Kursus B',
            'tanggalPemesanan' => '2023-10-02',
            'status' =>  "Pembayaran Berhasil",
            'harga' => 2000000,
            'namaLenkap' => 'Jane Smith',
            'jmlPeserta' => 1,
        ],
        [
            'namaPaket' => 'Kursus C',
            'tanggalPemesanan' => '2023-10-03',
            'status' =>  "Pembayaran Gagal",
            'harga' => 1500000,
            'namaLenkap' => 'Alice Johnson',
            'jmlPeserta' => 3,
        ],
        [
            'namaPaket' => 'Kursus D',
            'tanggalPemesanan' => '2023-10-04',
            'status' =>  "Menunggu Pembayaran",
            'harga' => 1750000,
            'namaLenkap' => 'Bob Brown',
            'jmlPeserta' => 4,
        ],
        [
            'namaPaket' => 'Kursus E',
            'tanggalPemesanan' => '2023-10-05',
            'status' =>  "Pembayaran Berhasil",
            'harga' => 1250000,
            'namaLenkap' => 'Charlie Davis',
            'jmlPeserta' => 2,
        ],
        [
            'namaPaket' => 'Kursus F',
            'tanggalPemesanan' => '2023-10-06',
            'status' =>  "Pembayaran Gagal",
            'harga' => 1800000,
            'namaLenkap' => 'Diana Evans',
            'jmlPeserta' => 1,
        ],
        [
            'namaPaket' => 'Kursus G',
            'tanggalPemesanan' => '2023-10-07',
            'status' =>  "Menunggu Pembayaran",
            'harga' => 1600000,
            'namaLenkap' => 'Ethan Foster',
            'jmlPeserta' => 5,
        ],
        [
            'namaPaket' => 'Kursus H',
            'tanggalPemesanan' => '2023-10-08',
            'status' =>  "Pembayaran Berhasil",
            'harga' => 1900000,
            'namaLenkap' => 'Fiona Green',
            'jmlPeserta' => 2,
        ],
        [
            'namaPaket' => 'Kursus I',
            'tanggalPemesanan' => '2023-10-09',
            'status' =>  "Pembayaran Gagal",
            'harga' => 1300000,
            'namaLenkap' => 'George Harris',
            'jmlPeserta' => 3,
        ],
        
        // Add more data as needed
    ];

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

    public function bayarPesanan(){
        header('Content-Type: application/json');
        try{
            $data = $_POST;
            // $file = $_FILES['foto'];

            $file = $this->uploadImage($_FILES['foto']);

            $result = $this->model('Payment')->savePembayaran($data, $file);

            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}