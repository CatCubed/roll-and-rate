<?php

namespace models;
use PDO;

require_once 'includes/db.php';

class Review {
    public static function getAllReviews() {
        $conn = getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM reviews ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getReviewById($id) {
        $conn = getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM reviews WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getReviewByTitle($title) {
        $conn = getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM reviews WHERE title = :title");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}