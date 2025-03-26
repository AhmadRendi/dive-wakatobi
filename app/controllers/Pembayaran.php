<?php

session_start();

class Pembayaran extends Controller {

    public function index(){

        $data = [
                [
                    'nama' => 'Wisatawan A',
                    'namaPaket' => 'Paket A',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Success'
                ],
                [
                    'nama' => 'Wisatawan B',
                    'namaPaket' => 'Paket B',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Pending'
                ],
                [
                    'nama' => 'Wisatawan C',
                    'namaPaket' => 'Paket C',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'nama' => 'Wisatawan D',
                    'namaPaket' => 'Paket D',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Pending'
                ],
                [
                    'nama' => 'Wisatawan E',
                    'namaPaket' => 'Paket E',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'nama' => 'Wisatawan F',
                    'namaPaket' => 'Paket F',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'nama' => 'Wisatawan G',
                    'namaPaket' => 'Paket G',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Failed'
                ],
                [
                    'nama' => 'Wisatawan H',
                    'namaPaket' => 'Paket H',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'nama' => 'Wisatawan I',
                    'namaPaket' => 'Paket I',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ],
                [
                    'nama' => 'Wisatawan J',
                    'namaPaket' => 'Paket J',
                    'metodePembayaran' => 'Transfer Bank',
                    'statusPembayaran' => 'Ongoing'
                ]
            ];
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('pembayaran/index', $data);
        $this->view('template/Footer');
    }

}