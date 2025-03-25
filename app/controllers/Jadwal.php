<?php


session_start();

class Jadwal extends Controller {


    public function index(){

        $data = [
                [
                    'namaPaket' => 'Paket A',
                    'deskripsi' => 'Paket A adalah paket yang paling murah',
                    'harga' => 'Rp. 1.000.000'
                ],
                [
                    'namaPaket' => 'Paket B',
                    'deskripsi' => 'Paket B adalah paket yang paling mahal',
                    'harga' => 'Rp. 2.000.000'
                ],
                [
                    'namaPaket' => 'Paket C',
                    'deskripsi' => 'Paket C adalah paket yang paling menarik',
                    'harga' => 'Rp. 1.500.000'
                ],
                [
                    'namaPaket' => 'Paket D',
                    'deskripsi' => 'Paket D adalah paket yang paling seru',
                    'harga' => 'Rp. 1.750.000'
                ],
                [
                    'namaPaket' => 'Paket E',
                    'deskripsi' => 'Paket E adalah paket yang paling menantang',
                    'harga' => 'Rp. 1.250.000'
                ],
                [
                    'namaPaket' => 'Paket F',
                    'deskripsi' => 'Paket F adalah paket yang paling berkesan',
                    'harga' => 'Rp. 1.800.000'
                ],
                [
                    'namaPaket' => 'Paket G',
                    'deskripsi' => 'Paket G adalah paket yang paling menyenangkan',
                    'harga' => 'Rp. 1.600.000'
                ],
                [
                    'namaPaket' => 'Paket H',
                    'deskripsi' => 'Paket H adalah paket yang paling mengesankan',
                    'harga' => 'Rp. 1.900.000'
                ],
                [
                    'namaPaket' => 'Paket I',
                    'deskripsi' => 'Paket I adalah paket yang paling menghibur',
                    'harga' => 'Rp. 1.300.000'
                ],
                [
                    'namaPaket' => 'Paket J',
                    'deskripsi' => 'Paket J adalah paket yang paling menyegarkan',
                    'harga' => 'Rp. 1.700.000'
                ],
        ];

        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('jadwal/index', $data);
        $this->view('template/Footer');
    }

}