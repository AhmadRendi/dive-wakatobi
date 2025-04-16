<?php

session_start();

class Tujuan extends Controller {
    
    public function index() {
        $data = [
            'destinations' => [
                [
                    'title' => 'Wangi-Wangi',
                    'description' => 'Pulau dengan pantai indah dan terumbu karang yang eksotis.'
                ],
                [
                    'title' => 'Kaledupa',
                    'description' => 'Terkenal dengan keindahan hutan bakau yang terawat dan cocok untuk berwisata bahari.'
                ],
                [
                    'title' => 'Tomia',
                    'description' => 'Pulau dengan spot menyelam yang luar biasa dan kehidupan laut yang melimpah.'
                ],
                [
                    'title' => 'Binongko',
                    'description' => 'Kombinasi alam dan tradisi budaya yang masih asam di pulau ini.'
                ]
            ]
        ];
        
        $this->view('template/Header');
        $this->view('template/Sidebar');
        $this->view('tujuan/index', $data);
        $this->view('template/Footer');
    }
}