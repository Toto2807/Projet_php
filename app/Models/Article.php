<?php
namespace app\Models;

class Article {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllArticles() {
        try {
            $stmt = $this->pdo->query('SELECT * FROM article');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }       
}
?>
