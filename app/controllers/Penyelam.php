<?php

session_start();

class Penyelam extends Controller
{
    public function index()
    {

        $data = [
            [
                'nama' => 'Paket 1',
                'deskripsi' => 'Deskripsi paket 1',
                'harga' => 1000000,
                'gambar' => 'wakatobi1.png'
            ],
            [
                'nama' => 'Paket 2',
                'deskripsi' => 'Deskripsi paket 2',
                'harga' => 2000000,
                'gambar' => 'wakatobi1.png'
            ],
            [
                'nama' => 'Paket 3',
                'deskripsi' => 'Deskripsi paket 3',
                'harga' => 3000000,
                'gambar' => 'wakatobi1.png'
            ],
            [
                'nama' => 'Paket 4',
                'deskripsi' => 'Deskripsi paket 4',
                'harga' => 4000000,
                'gambar' => 'wakatobi1.png'
            ],
            [
                'nama' => 'Paket 5',
                'deskripsi' => 'Deskripsi paket 5',
                'harga' => 5000000,
                'gambar' => 'wakatobi1.png'
            ]
        ];

        // $data = null;

        // $data = $this->model('PenyelamModel')->getAllPackages();
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('penyelaman/index', $data);
        $this->view('template/Footer');
    }
}