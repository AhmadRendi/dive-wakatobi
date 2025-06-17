<?php

session_start();

class Pemesanan  extends Controller {

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

    public function delete(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $result = $this->models()->deletePesanan($id);
            echo json_encode(['status' => 'success', 'message' => $result]);
        }catch(Exception $e){
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}