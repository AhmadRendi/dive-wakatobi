<?php

session_start();

class Kursus extends Controller  {

    private $data = [
        [
            'namaPaket' => 'Kursus A',
            'deskripsi' => 'Kursus A adalah kursus yang paling murah',
            'harga' =>  1000000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus B',
            'deskripsi' => 'Kursus B adalah kursus yang paling mahal',
            'harga' => 2000000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus C',
            'deskripsi' => 'Kursus C adalah kursus yang paling menarik',
            'harga' => 1500000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus D',
            'deskripsi' => 'Kursus D adalah kursus yang paling seru',
            'harga' => 1750000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus E',
            'deskripsi' => 'Kursus E adalah kursus yang paling menantang',
            'harga' => 1250000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus F',
            'deskripsi' => 'Kursus F adalah kursus yang paling berkesan',
            'harga' => 1800000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus G',
            'deskripsi' => 'Kursus G adalah kursus yang paling menyenangkan',
            'harga' => 1600000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus H',
            'deskripsi' => 'Kursus H adalah kursus yang paling mengesankan',
            'harga' => 1900000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus I',
            'deskripsi' => 'Kursus I adalah kursus yang paling menghibur',
            'harga' => 1300000,
            'picture' => 'wakatobi1.png'
        ],
        [
            'namaPaket' => 'Kursus J',
            'deskripsi' => 'Kursus J adalah kursus yang paling menyegarkan',
            'harga' => 1700000,
            'picture' => 'wakatobi1.png'
        ]
    ];

    public function index(){
        try{
            if($_SESSION['user_role'] == 'ADMIN' || $_SESSION['user_role'] == 'USER'){
                $data = $this->mappingData();
                $this->view('template/Header');
                $this->view('template/Sidebar');
                $this->view('kursus/index', $data);
                $this->view('template/Footer');
            }else {
                // Flasher::setFlash('Anda tidak memiliki akses untuk mengakses halaman ini', 'danger');
                header('Location: ' . BASEURL . '/home');
                exit;
            }
            
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }


    private function mappingData(){
        $dataPaket = $this->models()->getPaketKursus();
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
}