<?php

class Guides {
    private $db;
    private $table = 'tbl_guide';

    public function __construct() {
        $this->db = new Database;
    }

    public function getGuide() {
        try {
            $query = "SELECT * FROM $this->table";
            $this->db->query($query);
            // Uncomment the line below to execute the query
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }

    public function getGuideById($id) {
        try {
            $query = "SELECT guideName FROM $this->table WHERE id = ?";
            $this->db->query($query);
            $this->db->bind(1, $id);
            return $this->db->single();
        } catch (PDOException $e) {
            throw new PDOException('Error: ' . $e->getMessage());
        }
    }
}