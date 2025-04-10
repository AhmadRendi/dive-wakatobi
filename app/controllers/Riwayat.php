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
}