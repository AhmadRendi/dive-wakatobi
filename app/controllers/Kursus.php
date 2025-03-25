<?php

session_start();

class Kursus extends Controller  {

    public function index(){

        $data = [
            [
                'namaKursus' => 'Kursus A',
                'deskripsi' => 'Kursus A adalah kursus yang paling murah',
                'harga' => 'Rp. 1.000.000'
            ],
            [
                'namaKursus' => 'Kursus B',
                'deskripsi' => 'Kursus B adalah kursus yang paling mahal',
                'harga' => 'Rp. 2.000.000'
            ],
            [
                'namaKursus' => 'Kursus C',
                'deskripsi' => 'Kursus C adalah kursus yang paling menarik',
                'harga' => 'Rp. 1.500.000'
            ],
            [
                'namaKursus' => 'Kursus D',
                'deskripsi' => 'Kursus D adalah kursus yang paling seru',
                'harga' => 'Rp. 1.750.000'
            ],
            [
                'namaKursus' => 'Kursus E',
                'deskripsi' => 'Kursus E adalah kursus yang paling menantang',
                'harga' => 'Rp. 1.250.000'
            ],
            [
                'namaKursus' => 'Kursus F',
                'deskripsi' => 'Kursus F adalah kursus yang paling berkesan',
                'harga' => 'Rp. 1.800.000'
            ],
            [
                'namaKursus' => 'Kursus G',
                'deskripsi' => 'Kursus G adalah kursus yang paling menyenangkan',
                'harga' => 'Rp. 1.600.000'
            ],
            [
                'namaKursus' => 'Kursus H',
                'deskripsi' => 'Kursus H adalah kursus yang paling mengesankan',
                'harga' => 'Rp. 1.900.000'
            ],
            [
                'namaKursus' => 'Kursus I',
                'deskripsi' => 'Kursus I adalah kursus yang paling menghibur',
                'harga' => 'Rp. 1.300.000'
            ],
            [
                'namaKursus' => 'Kursus J',
                'deskripsi' => 'Kursus J adalah kursus yang paling menyegarkan',
                'harga' => 'Rp. 1.700.000'
            ]
        ];

        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('kursus/index', $data);
        $this->view('template/Footer');
    }

}