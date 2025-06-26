<?php

session_start();

class Home extends Controller {

    public function index() {
        
        $data = [
            'testimonials' => $this->model('Testimonis')->getAllTestimonials(),
            'penyelam' => $this->model('Packet')->getPaket(),
            'kursus' => $this->model('Packet')->getPaketKursus()
        ];

        $user_role = null;

        if (!empty($data['penyelam'])) {
            foreach ($data['penyelam'] as &$penyelam) {
                if (isset($penyelam['deskripsi'])) {
                    $pos = stripos($penyelam['deskripsi'], 'Termasuk :');
                    $penyelam['deskripsi'] = trim(
                        $pos !== false ? substr($penyelam['deskripsi'], 0, $pos) : $penyelam['deskripsi']
                    );
                }
            }
            unset($penyelam); // best practice after reference in foreach
        }

        if (!empty($data['kursus'])) {
            foreach ($data['kursus'] as &$kursus) {
                if (isset($kursus['deskripsi'])) {
                    $pos = stripos($kursus['deskripsi'], 'Termasuk :');
                    $kursus['deskripsi'] = trim(
                        $pos !== false ? substr($kursus['deskripsi'], 0, $pos) : $kursus['deskripsi']
                    );
                }
            }
            unset($kursus);
        }

        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('home/index', $data);
        $this->view('template/Footer');
    }
}