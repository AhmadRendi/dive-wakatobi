<?php

session_start();

class Pembayaran extends Controller {

    public function index(){

        $datas = [
                [
                    'id' => 1,
                    'nama' => 'Wisatawan A',
                    'namaPaket' => 'Paket A',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Success'
                ],
                [
                    'id' => 2,
                    'nama' => 'Wisatawan B',
                    'namaPaket' => 'Paket B',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Pending'
                ],
                [
                    'id' => 3,
                    'nama' => 'Wisatawan C',
                    'namaPaket' => 'Paket C',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'id' => 4,
                    'nama' => 'Wisatawan D',
                    'namaPaket' => 'Paket D',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Pending'
                ],
                [
                    'id' => 5,
                    'nama' => 'Wisatawan E',
                    'namaPaket' => 'Paket E',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'id' => 6,
                    'nama' => 'Wisatawan F',
                    'namaPaket' => 'Paket F',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'id' => 7,
                    'nama' => 'Wisatawan G',
                    'namaPaket' => 'Paket G',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Failed'
                ],
                [
                    'id' => 8,
                    'nama' => 'Wisatawan H',
                    'namaPaket' => 'Paket H',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'id' => 9,
                    'nama' => 'Wisatawan I',
                    'namaPaket' => 'Paket I',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'id' => 10,
                    'nama' => 'Wisatawan J',
                    'namaPaket' => 'Paket J',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ]
            ];
        $data = $this->model('Payment')->getPembayaran();
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('pembayaran/index', $data);
        $this->view('template/Footer');
    }

    public function getBuktiPembayaran(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $result = $this->model('Payment')->getBuktiById($id);
            // $result = $_POST['id'];
            echo json_encode(['status' => 'success', 'data' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function verifikasiPembayaran(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $result = $this->model('Booking')->verifikasiPembayaran($id);
            echo json_encode(['status' => 'success', 'message' => $result]);
        }catch (Exception $e){
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}