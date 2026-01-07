<?php

class Game_model {
    private $table = 'games'; // PASTIKAN INI SAMA DENGAN DI PHPMYADMIN
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllGames() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataGame($data) {
        $query = "INSERT INTO " . $this->table . " (judul, genre, rating) 
                    VALUES (:judul, :genre, :rating)";
        
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('rating', $data['rating']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataGame($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataGame() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE judul LIKE :keyword";
        
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        
        return $this->db->resultSet();
    }

    // Ambil 1 data untuk diedit
    public function getGameById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Proses Update ke Database
    public function ubahDataGame($data) {
        $query = "UPDATE " . $this->table . " SET 
                    judul = :judul, 
                    genre = :genre, 
                    rating = :rating 
                WHERE id = :id"; // <--- INI BAGIAN PALING KRUSIAL
        
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('id', $data['id']); // Mengambil ID dari input hidden di modal
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    // Menghitung total data game untuk menentukan jumlah halaman
    public function getTotalData() {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        return $this->db->single()['total'];
    }

    // Mengambil data dengan batasan LIMIT dan OFFSET
    public function getGameByLimit($awalData, $jumlahDataPerHalaman) {
        // Gunakan bindValue dengan parameter ketiga PDO::PARAM_INT
        $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT :awalData, :jumlahDataPerHalaman');
        $this->db->bind('awalData', (int)$awalData);
        $this->db->bind('jumlahDataPerHalaman', (int)$jumlahDataPerHalaman);
        return $this->db->resultSet();
    }
}