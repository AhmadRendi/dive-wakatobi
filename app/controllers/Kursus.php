<?php

session_start();

class Kursus extends Controller  {

    private $data = [
        [
            'namaKursus' => 'Kursus A',
            'deskripsi' => 'Kursus A adalah kursus yang paling murah',
            'harga' =>  1000000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus B',
            'deskripsi' => 'Kursus B adalah kursus yang paling mahal',
            'harga' => 2000000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus C',
            'deskripsi' => 'Kursus C adalah kursus yang paling menarik',
            'harga' => 1500000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus D',
            'deskripsi' => 'Kursus D adalah kursus yang paling seru',
            'harga' => 1750000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus E',
            'deskripsi' => 'Kursus E adalah kursus yang paling menantang',
            'harga' => 1250000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus F',
            'deskripsi' => 'Kursus F adalah kursus yang paling berkesan',
            'harga' => 1800000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus G',
            'deskripsi' => 'Kursus G adalah kursus yang paling menyenangkan',
            'harga' => 1600000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus H',
            'deskripsi' => 'Kursus H adalah kursus yang paling mengesankan',
            'harga' => 1900000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus I',
            'deskripsi' => 'Kursus I adalah kursus yang paling menghibur',
            'harga' => 1300000,
            'gambar' => 'wakatobi1.png'
        ],
        [
            'namaKursus' => 'Kursus J',
            'deskripsi' => 'Kursus J adalah kursus yang paling menyegarkan',
            'harga' => 1700000,
            'gambar' => 'wakatobi1.png'
        ]
    ];


    public function index(){
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('kursus/index', $this->data);
        $this->view('template/Footer');
    }

}