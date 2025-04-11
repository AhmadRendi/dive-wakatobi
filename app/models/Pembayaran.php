<?php

class Pembayaran {

    private $db;
    private $table = 'tbl_pembayaran';

    public function __construct() {
        $this->db = new Database;
    }


    public function savePembayaran($data, $file){
        try{
            $query = "INSERT INTO $this->table (id_pemesanan, metodePembayaran, picture) VALUES (?, ?, ?)";
            $this->db->query($query);
            $this->db->bind(1, $data['id_pembayaran']);
            $this->db->bind(2, $data['metodePembayaran']);
            $this->db->bind(3, $file);
            
            $this->db->execute();

            return "Pembayaran Berhasil";
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

}