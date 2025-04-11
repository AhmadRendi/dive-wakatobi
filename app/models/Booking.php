<?php

class Booking {

    private $db;
    private $table = 'tbl_pemesanan';

    public function __construct() {
        $this->db = new Database;
    }

    public function savePemesanan($data){
        try{
            $query = "INSERT INTO $this->table (id_user, id_paket, id_guide, id_keahlian, namaLengkap, tanggalPemesanan, status, jmlPeserta, harga) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($query);
            $this->db->bind(1, $data['id_user']);
            $this->db->bind(2, $data['id_paket']);
            $this->db->bind(3, $data['id_quide']);
            $this->db->bind(4, $data['id_keahlian']);
            $this->db->bind(5, $data['namaLengkap']);
            $this->db->bind(6, $data['tanggalPemesanan']);
            $this->db->bind(7, $data['status']);
            $this->db->bind(8, $data['jmlPeserta']);
            $this->db->bind(9, $data['harga']);
            $this->db->execute();

            return "Data pemesanan berhasil disimpan";
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getAllPesanan(){
        try{
            $query = "SELECT id, id_paket, namaLengkap, tanggalPemesanan, status FROM $this->table";
            // $query = "SELECT * FROM $this->table";
            $this->db->query($query);
            return $this->db->resultSet();
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getPesananById($id){
        try{
            $query = "SELECT * FROM $this->table WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            return $this->db->single();
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getPesananByEmail($email){
        try{
            $query = "SELECT pemesanan.id, paket.namaPaket, pemesanan.tanggalPemesanan, pemesanan.status, paket.harga, pemesanan.namaLengkap, pemesanan.jmlPeserta FROM tbl_pemesanan AS pemesanan
                JOIN tbl_paket AS paket ON pemesanan.id_paket = paket.id
                JOIN tb_user AS user ON pemesanan.id_user = user.id
                WHERE `user`.email = ?";
            $this->db->query($query);
            $this->db->bind(1, $email);
            return $this->db->resultSet();
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function batalPesananById($id){
        try{
            $query = "UPDATE $this->table SET status = 'DiBatalkan'  WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            // $this->db->execute();
            return "Pesaanan Berhasil Dibatalkan";
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

}