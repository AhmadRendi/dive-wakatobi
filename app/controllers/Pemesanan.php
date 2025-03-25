<?php

session_start();

class Pemesanan  extends Controller {


    public function index(){
        $data = [
            'orders' => [
                [
                    'tourist' => 'Wisatawan A',
                    'package' => 'Paket A',
                    'date' => '23 Desember 2023',
                    'status' => 'Selesai'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ],
                [
                    'tourist' => 'Wisatawan B',
                    'package' => 'Paket B',
                    'date' => '18-12-2024',
                    'status' => 'Ongoing'
                ]
            ]
        ];
        
        $this->view('template/Header', ['title' => 'Pemesanan Paket Penyelaman']);
        $this->view('template/Sidebar');
        $this->view('pemesanan/index', $data);
        $this->view('template/Footer');

       
    }

}