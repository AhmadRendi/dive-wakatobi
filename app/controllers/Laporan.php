<?php

session_start();

class Laporan extends Controller {

    public function index(){

        $data =[
                [
                    'idPemesanan' => '1',
                    'name' => 'Wisatawan A',
                    'tanggalPemesanan' => '2021-08-01',
                    'statusPembayaran' => 'Success',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '2',
                    'name' => 'Wisatawan B',
                    'tanggalPemesanan' => '2021-08-02',
                    'statusPembayaran' => 'Pending',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '3',
                    'name' => 'Wisatawan C',
                    'tanggalPemesanan' => '2021-08-03',
                    'statusPembayaran' => 'Ongoing',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '4',
                    'name' => 'Wisatawan D',
                    'tanggalPemesanan' => '2021-08-04',
                    'statusPembayaran' => 'Pending',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '5',
                    'name' => 'Wisatawan E',
                    'tanggalPemesanan' => '2021-08-05',
                    'statusPembayaran' => 'Ongoing',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '6',
                    'name' => 'Wisatawan F',
                    'tanggalPemesanan' => '2021-08-06',
                    'statusPembayaran' => 'Ongoing',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '7',
                    'name' => 'Wisatawan G',
                    'tanggalPemesanan' => '2021-08-07',
                    'statusPembayaran' => 'Failed',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '8',
                    'name' => 'Wisatawan H',
                    'tanggalPemesanan' => '2021-08-08',
                    'statusPembayaran' => 'Ongoing',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '9',
                    'name' => 'Wisatawan I',
                    'tanggalPemesanan' => '2021-08-09',
                    'statusPembayaran' => 'Ongoing',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ],
                [
                    'idPemesanan' => '10',
                    'name' => 'Wisatawan J',
                    'tanggalPemesanan' => '2021-08-10',
                    'statusPembayaran' => 'Ongoing',
                    'totalPembayaran' => 'Rp. 1.000.000'
                ]
        ];
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('laporan/index', $data);
        $this->view('template/Footer');
    }
}