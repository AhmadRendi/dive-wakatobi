<?php

session_start();

class HubungiKami extends Controller {

    public function index() {
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('hubungi_kami/index');
        $this->view('template/Footer');
    }

    public function kirimPesan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            echo "Sampaikan pesan anda di bawah ini:<br>";


            $model = $this->model('Pesan');


            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];
            $noHp = $_POST['noHp'];

            $model->addMessage($nama, $email, $pesan, $noHp);


            header('Location: ' . BASEURL . '/HubungiKami?pesan_terkirim=true');
            exit;
        }
    }
}

