<?php

session_start();

class Penyelam extends Controller{

    public function index(){
        if($_SESSION['user_role'] == 'USER'){
            $data = $this->mappingData();
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
            $id = $_POST['id'];
            $data = $this->models()->getPaketById($id);
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
            echo json_encode(['status' => 'success','message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }
}