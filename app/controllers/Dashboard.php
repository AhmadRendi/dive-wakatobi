<?php

session_start();

class Dashboard extends Controller {

    public function index() {
        if ($_SESSION['user_role'] == 'ADMIN') {
            $data = $this->model('Booking')->getTotalPesanan();

            $associativeArray = array();
            foreach ($data as $item) {
                $associativeArray[$item['label']] = array("total" => $item['total']);
            }

            $this->view('template/Header'); 
            $this->view('template/Sidebar');
            $this->view('dashboard/index', $associativeArray);
            $this->view('template/Footer');
        } else {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }
}