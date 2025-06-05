<?php

class Pesan{

    private $db;
    private $table = 'tbl_pesan';


    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMessages(){
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMessage($nama, $email, $pesan, $noHp){
        try{
            $query = "INSERT INTO " . $this->table . " (nama, email, pesan, noHp) VALUES (?, ?, ?, ?)";
            $this->db->query($query);
            $this->db->bind(1, $nama);
            $this->db->bind(2, $email);
            $this->db->bind(3, $pesan);
            $this->db->bind(4, $noHp);
            return $this->db->execute();
        }catch (PDOException $e){
            throw new Exception('Error: ' . $e->getMessage());
        }
    }

    public function updatePesanById($id){
        try {
            $query = "UPDATE " . $this->table . " SET status = 'Read' WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            return $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception('Error: ' . $e->getMessage());
        }
    }

}