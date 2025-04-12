<?php

session_start();

class Dashboard extends Controller {

    public function index() {
        $datas = [
            'stats' => [
                'packages' => 50,
                'orders' => 120,
                'success_rate' => 75
            ],
            'activities' => [
                [
                    'text' => 'Wisatawan A memesan paket U',
                    'time' => '2 jam yang lalu'
                ],
                [
                    'text' => 'Wisatawan T melakukan pembayaran',
                    'time' => '3 jam yang lalu'
                ],
                [
                    'text' => 'Admin menerbitkan jadwal baru',
                    'time' => '5 jam yang lalu'
                ]
            ]
        ];

        $data = $this->model('Booking')->getTotalPesanan();

        $associativeArray = array();
        foreach ($data as $item) {
            $associativeArray[$item['label']] = array("total" => $item['total']);
        }

        $this->view('template/Header'); 
        $this->view('template/Sidebar');
        $this->view('dashboard/index', $associativeArray);
        $this->view('template/Footer');
    }
}