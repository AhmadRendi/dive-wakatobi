<?php

class Testimonis
{
    private $db;
    private $table = 'tbl_testimoni';

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTestimonials()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY date DESC";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTestimonial($email, $rating, $comment)
    {
        // Get user ID from email
        $query = "SELECT id FROM tb_user WHERE email = ?";
        $this->db->query($query);
        $this->db->bind(1, $email);
        $userId = $this->db->single()['id'];

        if ($userId) {
            // Insert testimonial
            $query = "INSERT INTO " . $this->table . " (id_user, rating, komentar) VALUES (?, ?, ?)";
            $this->db->query($query);
            $this->db->bind(1, $userId);
            $this->db->bind(2, $rating);
            $this->db->bind(3, $comment);
            return $this->db->execute();
        } else {
            throw new Exception("User not found");
        }
    }
}