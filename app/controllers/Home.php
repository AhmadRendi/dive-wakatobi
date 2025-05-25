<?php

session_start();

class Home extends Controller {

    public function index() {
$data = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'profile_img' => 'https://via.placeholder.com/50',
        'rating' => 5,
        'comment' => 'Tempat ini sangat bagus dan sangat menyenangkan untuk dikunjungi dan sangat recommended untuk dikunjungi.',
        'date' => '2023-05-15'
    ],
    [
        'id' => 2,
        'name' => 'Jane Smith',
        'profile_img' => 'https://via.placeholder.com/50',
        'rating' => 4,
        'comment' => 'Pelayanan yang sangat baik dan ramah. Saya pasti akan kembali lagi.',
        'date' => '2023-05-10'
    ],
    [
        'id' => 3,
        'name' => 'David Wilson',
        'profile_img' => 'https://via.placeholder.com/50',
        'rating' => 3,
        'comment' => 'Pengalaman yang menyenangkan, meskipun ada beberapa hal yang bisa ditingkatkan.',
        'date' => '2023-05-05'
    ],
    [
        'id' => 4,
        'name' => 'Sarah Johnson',
        'profile_img' => 'https://via.placeholder.com/50',
        'rating' => 1,
        'comment' => 'Sangat merekomendasikan! Pengalaman yang luar biasa dan tidak akan terlupakan.',
        'date' => '2023-04-28'
    ],
    [
        'id' => 5,
        'name' => 'Michael Brown',
        'profile_img' => 'https://via.placeholder.com/50',
        'rating' => 4,
        'comment' => 'Harga yang terjangkau untuk kualitas yang ditawarkan. Sangat puas dengan kunjungan saya.',
        'date' => '2023-04-20'
    ],
];
    $data = $this->model('Testimonis')->getAllTestimonials();

        // $data = null;
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('home/index', $data);
        $this->view('template/Footer');
    }
}