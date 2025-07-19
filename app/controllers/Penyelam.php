<?php

session_start();

class Penyelam extends Controller{

    public function index(){
        if($_SESSION['user_role'] == 'USER'){
            $data = $this->mappingData();

            if (!empty($data['paket'])) {
                foreach ($data['paket'] as &$paket) {
                    if (isset($paket['deskripsi']) && is_string($paket['deskripsi'])) {
                        $deskripsiPaket = $paket['deskripsi'];

                        $posTermasuk = stripos($deskripsiPaket, 'Termasuk :');

                        if ($posTermasuk !== false) {
                            $deskripsiKegiatan = substr($deskripsiPaket, 0, $posTermasuk);
                        } else {
                            $deskripsiKegiatan = $deskripsiPaket;
                        }

                        $paket['deskripsi'] = trim($deskripsiKegiatan);
                    }
                }
                unset($paket);
            }

            $this->view('template/Header');
            $this->view('template/Sidebar');
            $this->view('penyelaman/index', $data);
            $this->view('template/Footer');

        }else {
            header('Location: ' . BASEURL . '/Paket');
            exit;
        }
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

        foreach ($dataPaket as $item) {
            $dataResult['paket'][] = [
                'id' => $item['id'],
                'namaPaket' => $item['namaPaket'],
                'deskripsi' => $item['deskripsi'],
                'harga' => $item['harga'],
                'picture' => $item['picture'],
            ];
        }

        foreach ($dataGuide as $item) {
            $dataResult['guide'][] = [
                'id' => $item['id'],
                'guideName' => $item['guideName'],
                'guideRating' => $item['guideRating'],
                'guideBio' => $item['guideBio'],
            ];
        }

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
            $id = $_POST['id'];
            $data = $this->models()->getPaketById($id);
            $result = $data;
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(['error' => 'Terjadi kesalahan saat memproses permintaan.']);
        }
    }

    private function validateName($nameLengkap){
        if(!preg_match("/^[a-zA-Z ]*$/", $nameLengkap)){
            throw new Exception("Nama Paket tidak boleh mengandung simbol");
        }
    }

    private function validateDate($tanggal){
        $today_date = date("Y-m-d");
        if($tanggal < $today_date){
            throw new Exception("Tanggal inputan lebih besar dari tanggal hari ini.");
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

            // $harga = $modelPaket['harga'];

            $data = [
                'id_user' => $idUser,
                'id_paket' => $_POST['idPaket'],
                'id_quide' => $_POST['guideId'],
                'id_keahlian' => $_POST['keahlianId'],
                'namaLengkap' => $_POST['namaLengkap'],
                'tanggalPemesanan' => $_POST['tanggalPemesanan'],
                'status' => 'Menunggu Pembayaran',
                'jmlPeserta' => $_POST['jmlPeserta'],
                'harga' => $_POST['totalHarga'],
                'noHp' => $_POST['noHp'],
            ];

            $this->validateName($data['namaLengkap']);
            $this->validateDate($data['tanggalPemesanan']);

            $result = $this->model("Booking")->savePemesanan($data);
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}