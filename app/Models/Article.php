<?php
namespace app\Models;

class Article {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllArticles() {
        $stmt = $this->pdo->query('SELECT * FROM articles');
        return $stmt->fetchAll();
    }
}
?>
