<?php

session_start();

class Penyelam extends Controller{

    private $data = [
        [
            'id' => 1,
            'nama' => 'Paket 1',
            'deskripsi' => 'Deskripsi paket 1',
            'harga' => 1000000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'id' => 2,
            'nama' => 'Paket 2',
            'deskripsi' => 'Deskripsi paket 2',
            'harga' => 2000000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'id' => 3,
            'nama' => 'Paket 3',
            'deskripsi' => 'Deskripsi paket 3',
            'harga' => 3000000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'id' => 4,
            'nama' => 'Paket 4',
            'deskripsi' => 'Deskripsi paket 4',
            'harga' => 4000000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'id' => 5,
            'nama' => 'Paket 5',
            'deskripsi' => 'Deskripsi paket 5',
            'harga' => 5000000,
            'gambar' => 'wakatobi1.png'
        ]
    ];

    public function index(){
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('penyelaman/index', $this->data);
        $this->view('template/Footer');
    }

    public function detailPaket(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $datas = array_filter($this->data, function($item) use ($id){
                return $item['id'] == $id;
            });
            $result = !empty($datas) ? (object) array_values($datas)[0] : null;
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(['error' => 'Terjadi kesalahan saat memproses permintaan.']);
        }
        
    }
}