<?php

class Payment {

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

    public function getPembayaran(){
        try{
            $query = "SELECT pembayaran.id, pemesanan.status, pembayaran.metodePembayaran, user.namaLengkap, paket.`namaPaket`
                FROM $this->table AS pembayaran
                JOIN tbl_pemesanan AS pemesanan ON pembayaran.id_pemesanan = pemesanan.id
                JOIN tbl_paket AS paket ON pemesanan.id_paket = paket.id
                JOIN tb_user AS user ON pemesanan.id_user = user.id";
            $this->db->query($query);
            return $this->db->resultSet();
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getBuktiById($id){
        try{
            $query = "SELECT picture FROM $this->table WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            return $this->db->single();
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

}