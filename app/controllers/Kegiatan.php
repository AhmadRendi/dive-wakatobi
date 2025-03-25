<?php
class Kegiatan extends Controller {
    public function index() {
        $data = [
            'activities' => [
                [
                    'title' => 'Snorkeling',
                    'description' => 'Menikmati keindahan terumbu karang dan biota laut di permukaan air.'
                ],
                [
                    'title' => 'Scuba Diving',
                    'description' => 'Eksplorasi lebih dalam ke dunia bawah laut dengan diving bersama instruktur bersertifikat.'
                ],
                [
                    'title' => 'Kursus Menyelam',
                    'description' => 'Ikuti kursus menyelam untuk mendapatkan sertifikat dan kemampuan menyelam yang lebih baik.'
                ]
            ]
        ];
        
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('kegiatan/index', $data);
        $this->view('template/Footer');
    }
}

