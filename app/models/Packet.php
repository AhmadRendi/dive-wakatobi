<?php

class Packet {

    private $db;
    private $table = 'tbl_paket';

    public function __construct(){
        $this->db = new Database;
    }

    public function savePaket($data, $file){
        try{
            $query = "INSERT INTO $this->table (namaPaket, deskripsi, harga, picture, paket) VALUES (?, ?, ?, ?, ?)";
            $this->db->query($query);
            $this->db->bind(1, $data['namaPaket']);
            $this->db->bind(2, $data['deskripsi']);
            $this->db->bind(3, $data['harga']);
            $this->db->bind(4, $file);
            $this->db->bind(5, $data['paket']);
            $this->db->execute();
            return "Data berhasil disimpan";
        }catch (PDOException $e){
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

}
