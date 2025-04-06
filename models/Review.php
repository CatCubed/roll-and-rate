<?php
require_once 'includes/db.php';

class Review {
    public static function getAllReviews() {
        $mysqli = getDbConnection();
        $result = $mysqli->query("SELECT * FROM reviews ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getReviewById($id) {
        $mysqli = getDbConnection();
        $stmt = $mysqli->prepare("SELECT * FROM reviews WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function getReviewByTitle($title) {
        $mysqli = getDbConnection();
        $stmt = $mysqli->prepare("SELECT * FROM reviews WHERE title = ?");
        $stmt->bind_param('s', $title);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}