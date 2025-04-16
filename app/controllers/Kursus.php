<?php

session_start();

class Kursus extends Controller  {

    public function index(){
        try{
            if($_SESSION['user_role'] == 'ADMIN' || $_SESSION['user_role'] == 'USER'){
                $data = $this->mappingData();
                $this->view('template/Header');
                $this->view('template/Sidebar');
                $this->view('kursus/index', $data);
                $this->view('template/Footer');
            }else {
                header('Location: ' . BASEURL . '/Login');
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