<?php

class Packet {

    private $db;
    private $table = 'tbl_paket';

    public function __construct(){
        $this->db = new Database;
    }

    public function savePaket($data, $file){
        try{
            $query = "INSERT INTO $this->table (namaPaket, deskripsi, harga, picture, paket, waktu, lokasi) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->db->query($query);
            $this->db->bind(1, $data['namaPaket']);
            $this->db->bind(2, $data['deskripsi']);
            $this->db->bind(3, $data['harga']);
            $this->db->bind(4, $file);
            $this->db->bind(5, $data['paket']);
            $this->db->bind(6, $data['waktu']);
            $this->db->bind(7, $data['lokasi']);
            $this->db->execute();
            return "Data berhasil disimpan";
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getPaket(){
        try{
            $query = "SELECT * FROM $this->table WHERE paket = 'PENYELAM'";
            $this->db->query($query);
            return $this->db->resultSet();
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getPaketKursus(){
        try{
            $query = "SELECT * FROM $this->table WHERE paket = 'KURSUS'";
            $this->db->query($query);
            return $this->db->resultSet();
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getPaketById($id){
        try{
            $query = "SELECT * FROM $this->table WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            return $this->db->single();
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getNamePaketById($id){
        try{
            $query = "SELECT namaPaket FROM $this->table WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            return $this->db->single();
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }
}
