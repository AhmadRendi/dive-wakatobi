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
        $data = $this->mappingData();
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('penyelaman/index', $data);
        $this->view('template/Footer');
    }

    private function mappingData(){
        $dataPaket = $this->models()->getPaket();
        $dataGuide = $this->model('Guides')->getGuide();
        $dataKeahlian = $this->model('Keahlian')->getKeahlian();

        $dataResult = [
            'paket' => [],
            'guide' => [],
            'keahlian' => []
        ];

        // Mengumpulkan data paket
        foreach ($dataPaket as $item) {
            $dataResult['paket'][] = [
                'id' => $item['id'],
                'namaPaket' => $item['namaPaket'],
                'deskripsi' => $item['deskripsi'],
                'harga' => $item['harga'],
                'picture' => $item['picture'],
            ];
        }

        // // Mengumpulkan data guide
        foreach ($dataGuide as $item) {
            $dataResult['guide'][] = [
                'id' => $item['id'],
                'guideName' => $item['guideName'],
                'guideRating' => $item['guideRating'],
                'guideBio' => $item['guideBio'],
            ];
        }

        // // Mengumpulkan data keahlian
        foreach ($dataKeahlian as $item) {
            $dataResult['keahlian'][] = [
                'id' => $item['id'],
                'namaKeahlian' => $item['namaKeahlian'],
                'keahlian' => $item['keahlian'],
            ];
        }

        return $dataResult;
    }

    private function models(){
        return $this->model('Packet');
    }

    public function detailPaket(){
        header('Content-Type: application/json');
        try{
            // $data = $this->models()->getPaket();
            $id = $_POST['id'];
            $data = $this->models()->getPaketById($id);
            // $datas = array_filter($data, function($item) use ($id){
            //     return $item['id'] == $id;
            // });
            // $result = !empty($datas) ? (object) array_values($datas)[0] : null;
            $result = $data;
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(['error' => 'Terjadi kesalahan saat memproses permintaan.']);
        }
    }

    public function savePemesanan(){
        header('Content-Type: application/json');
        try{

            $modelUser = $this->model('Users')->getUserByEmail($_SESSION['email']);

            if($modelUser == null){
                throw new Exception('User tidak ditemukan');
            }

            $idUser = $modelUser['id'];

            $modelPaket = $this->models()->getPaketById($_POST['idPaket']);

            $harga = $modelPaket['harga'];

            $data = [
                'id_user' => $idUser,
                'id_paket' => $_POST['idPaket'],
                'id_quide' => $_POST['guideId'],
                'id_keahlian' => $_POST['keahlianId'],
                'namaLengkap' => $_POST['namaLengkap'],
                'tanggalPemesanan' => $_POST['tanggalPemesanan'],
                'status' => 'Menunggu Pembayaran',
                'jmlPeserta' => $_POST['jmlPeserta'],
                'harga' => $harga
            ];

            $result = $this->model("Booking")->savePemesanan($data);
            // $result = $_POST;
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}