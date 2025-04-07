<?php

session_start();

class Guide extends Controller {

    private $data = [
        'keahlian' => [
            [
                'id' => 1,
                // 'name' => 'Snorkeling'
                'guideKeahlian' => 'Snorkeling dan Scuba Diving dasar. Menguasai area perairan dangkal.'
            ],
            [
                'id' => 2,
                // 'name' => 'Scuba Diving'
                'guideKeahlian' => 'Scuba Diving, memiliki sertifikasi internasional. Spesialis dalam penyelaman mendalam.'
            ],
            [
                'id' => 3,
                // 'name' => 'Kursus Menyelam'
                'guideKeahlian' => 'Instruktur Diving bersertifikasi. Ahli dalam pelatihan dan kursus menyelam.'
            ]
        ],
        'guides' => [
            [
                'id' => 1,
                'guideName' => 'Guide 1',
                'guideRating' => 7.5,
                // 'guideKeahlian' => 'Snorkeling dan Scuba Diving dasar. Menguasai area perairan dangkal.',
                'guideBio' => 'Guide 1 adalah pemandu berpengalaman 5 tahun yang ramah dan sabar dengan pemula.'
            ],
            [
                'id' => 2,
                'guideName' => 'Guide 2',
                'guideRating' => 6.8,
                // 'guideKeahlian' => 'Scuba Diving, memiliki sertifikasi internasional. Spesialis dalam penyelaman mendalam.',
                'guideBio' => 'Guide 2 adalah pemandu yang memiliki pengalaman lebih dari 7 tahun dalam dunia scuba diving, terutama untuk menyelam di lokasi yang lebih dalam.'
            ],
            [
                'id' => 3,
                'guideName' => 'Guide 3',
                'guideRating' => 8.2,
                // 'guideKeahlian' => 'Instruktur Diving bersertifikasi. Ahli dalam pelatihan dan kursus menyelam.',
                'guideBio' => 'Guide 3 memiliki pengalaman 10 tahun sebagai instruktur diving profesional dan telah melatih ratusan penyelam baru.'
            ]
        ]
    ];

    public function models(){
        return $this->model('Guides');
    }

    public function getGuide(){
        header('Content-Type: application/json');
        try{
            $data = $this->models()->getGuide();
            $id = $_POST['id'];
            $dataReturn = array_filter($data, function($item) use ($id){
                return $item['id'] == $id;
            });
            $result = !empty($dataReturn) ? (object) array_values($dataReturn)[0] : null;
            echo json_encode($result);
        }catch (Exception $e) {
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

    public function getKeahlian(){
        header('Content-Type: application/json');
        try{
            $data = $this->model('Keahlian')->getKeahlian();
            $id = $_POST['id'];
            $dataReturn = array_filter($data, function($item) use ($id){
                return $item['id'] == $id;
            });
            $result = !empty($dataReturn) ? (object) array_values($dataReturn)[0] : null;
            echo json_encode($result);
        }catch (Exception $e) {
            echo json_encode(['status' => 'error','message' => $e->getMessage()]);
        }
    }

}