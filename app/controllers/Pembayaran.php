<?php

session_start();

class Pembayaran extends Controller {

    public function index(){

        if($_SESSION['user_role'] == 'ADMIN' || $_SESSION['user_role'] == 'USER'){
            try{
                $data = $this->model('Payment')->getPembayaran();
                $this->view('template/Header');
                $this->view('template/Sidebar');
                $this->view('pembayaran/index', $data);
                $this->view('template/Footer');
            }catch (Exception $e){
                echo json_encode(['status' => 'error','message' => $e->getMessage()]);
            }
        }else {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }

    public function getBuktiPembayaran(){
        header('Content-Type: application/json');
        try{
            $id = $_POST['id'];
            $result = $this->model('Payment')->getBuktiById($id);
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