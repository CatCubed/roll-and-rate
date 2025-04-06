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

    public static function createReview($data) {
        $mysqli = getDbConnection();

        $stmt = $mysqli->prepare("INSERT INTO reviews (title, text, image) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $data['title'], $data['text'], $data['image']);

        return $stmt->execute();
    }

    public static function updateReview($id, $data) {
        $mysqli = getDbConnection();

        $stmt = $mysqli->prepare("UPDATE reviews SET title = ?, text = ?, image = ? WHERE id = ?");
        $stmt->bind_param('sssi', $data['title'], $data['text'], $data['image'], $id);

        return $stmt->execute();
    }

    public static function deleteReview($id) {
        $mysqli = getDbConnection();

        $stmt = $mysqli->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}