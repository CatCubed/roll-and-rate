<?php

namespace models;

class Game {
    public static function getAllGames() {
        $conn = getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM games ORDER BY releaseYear DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getGameById($id) {
        $conn = getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getGameByTitle($title) {
        $conn = getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM games WHERE title = :title");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getFilteredGames($filters = []) {
        $conn = getDbConnection();

        $sql = "SELECT * FROM games WHERE 1=1";
        $params = [];

        if (!empty($filters['year'])) {
            $sql .= " AND releaseYear = :year";
            $params[':year'] = $filters['year'];
        }

        if (!empty($filters['difficulty'])) {
            $sql .= " AND difficulty = :difficulty";
            $params[':difficulty'] = $filters['difficulty'];
        }

        if (!empty($filters['genre'])) {
            $sql .= " AND genre = :genre";
            $params[':genre'] = $filters['genre'];
        }

        if (!empty($filters['playerCount'])) {
            $sql .= " AND playerCount = :playerCount";
            $params[':playerCount'] = $filters['playerCount'];
        }

        if (isset($filters['favorite']) && $filters['favorite'] === true) {
            $sql .= " AND favorite = 1";
        }

        if (!empty($filters['sort'])) {
            list($column, $direction) = explode('-', $filters['sort']);
            $sql .= " ORDER BY " . $column . " " . ($direction == 'desc' ? 'DESC' : 'ASC');
        } else {
            $sql .= " ORDER BY releaseYear DESC";
        }

        $stmt = $conn->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function toggleFavorite($id) {
        $conn = getDbConnection();
        $stmt = $conn->prepare("UPDATE games SET favorite = NOT favorite WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}