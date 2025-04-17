<?php

class Users {

    private $table = 'tb_user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function saveUser($data){
        try{
            $query = "INSERT INTO $this->table (namaLengkap, email, username, password, role, picture) VALUES" 
            . " (?, ?, ?, ?, ?, ?)";

            $this->db->query($query);
            $this->db->bind(1, $data['fullName']);
            $this->db->bind(2, $data['email']);
            $this->db->bind(3, $data['username']);
            $this->db->bind(4, password_hash($data['password'], PASSWORD_DEFAULT));
            $this->db->bind(5, $data['role']);
            $this->db->bind(6, $data['picture']);
            $this->db->execute();
            return "Data berhasil disimpan";
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getUserByEmail($email){
        try{
            $query = "SELECT * FROM $this->table WHERE email = ?";
            $this->db->query($query);
            $this->db->bind(1, $email);
            return $this->db->single();
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function updateUserByEmail($email, $data, $file){
        if($file != null){
            try{
                $query = "UPDATE $this->table SET namaLengkap = ?, noTelepon = ?, picture = ? WHERE email = ?";
                $this->db->query($query);
                $this->db->bind(1, $data['namaLengkap']);
                $this->db->bind(2, $data['nmrTelepon']);
                $this->db->bind(3, $file);
                $this->db->bind(4, $email);
                $this->db->execute();
                return "Data berhasil diupdate";
            }catch (PDOException $e){
                throw new Exception($e->getMessage());
            }
        }else{
            $query = "UPDATE $this->table SET namaLengkap = ?, noTelepon = ? WHERE email = ?";
            try{
                $this->db->query($query);
                $this->db->bind(1, $data['namaLengkap']);
                $this->db->bind(2, $data['nmrTelepons']);
                $this->db->bind(3, $email);
                $this->db->execute();
                return "Data berhasil diupdate";
            }catch (PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }
}