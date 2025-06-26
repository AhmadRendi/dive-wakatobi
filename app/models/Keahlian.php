<?php

class Keahlian {
    
    private $db;
    private $table = 'tbl_keahlian';

    public function __construct() {
        $this->db = new Database;
    }

    public function getKeahlian() {
        try {
            $query = "SELECT * FROM $this->table";
            $this->db->query($query);
            // Uncomment the line below to execute the query
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }
}