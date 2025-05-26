<?php

session_start();

class Pemesanan  extends Controller {

    private $data = [
        [
            'id' => 1,
            'nama' => 'Wisatawan A',
            'paket' => 'Paket A',
            'tanggal' => '23 Desember 2023',
            'status' => 'Selesai',
            'jumlahPeserta' => 2,
            'harga' => 1000000
        ],
        [
            'id' => 2,
            'nama' => 'Wisatawan B',
            'paket' => 'Paket B',
            'tanggal' => '18-12-2024',
            'status' => 'Ongoing',
            'jumlahPeserta' => 10,
            'harga' => 2000000
        ],
        [
            'id' => 3,
            'nama' => 'Wisatawan C',
            'paket' => 'Paket C',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 5,
            'harga' => 3000000
        ],
        [
            'id' => 4,
            'nama' => 'Wisatawan D',
            'paket' => 'Paket D',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 3,
            'harga' => 4000000
        ],
        [
            'id' => 5,
            'nama' => 'Wisatawan E',
            'paket' => 'Paket E',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 4,
            'harga' => 5000000
        ],
        [
            'id' => 6,
            'nama' => 'Wisatawan F',
            'paket' => 'Paket F',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 6,
            'harga' => 6000000
        ],
        [
            'id' => 7,
            'nama' => 'Wisatawan G',
            'paket' => 'Paket G',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 7,
            'harga' => 7000000
        ],
        [
            'id' => 8,
            'nama' => 'Wisatawan H',
            'paket' => 'Paket H',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 8,
            'harga' => 8000000
        ],
        [
            'id' => 9,
            'nama' => 'Wisatawan I',
            'paket' => 'Paket I',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 9,
            'harga' => 9000000
        ],
        [
            'id' => 10,
            'nama' => 'Wisatawan J',
            'paket' => 'Paket J',
            'tanggal' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 10,
            'harga' => 10000000
        ],
        [
            'id' => 11,
            'nama' => 'Wisatawan K',
            'paket' => 'Paket K',
            'tanggal;' => '18-12-2024',
            'status' => 'Pending',
            'jumlahPeserta' => 11,
            'harga' => 11000000
        ]
    ];

    public function index(){

        if($_SESSION['user_role'] == 'ADMIN'){
            $data = $this->models()->getAllPesanan();
            $pesananDenganNamaPaket = [];

            foreach ($data as $value) {
                $paket = $this->model("Packet")->getNamePaketById($value['id_paket']);
                $namaPaket = !empty($paket) ? $paket['namaPaket'] : '';
                $value['namaPaket'] = $namaPaket; 
                $pesananDenganNamaPaket[] = $value;
            }
            $this->view('template/Header');
            $this->view('template/Sidebar');
            $this->view('pemesanan/index', $pesananDenganNamaPaket);
            $this->view('template/Footer');
        }else {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    private function models(){
        return $this->model('Booking');
    }

    public function detail(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $data = $this->models()->getPesananById($id);

            $paket = $this->model("Packet")->getPaketById($data['id_paket']);
            
            $namaPaket = !empty($paket) ? $paket['namaPaket'] : '';
            $waktu = !empty($paket) ? $paket['waktu'] : '';

            $data['namaPaket'] = $namaPaket;
            $data['waktu'] = $waktu;


            $result = $data;
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}