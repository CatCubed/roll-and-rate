<?php
require_once 'includes/db.php';

class Game
{
    public static function getAllGames()
    {
        $mysqli = getDbConnection();
        $result = $mysqli->query("SELECT * FROM games ORDER BY releaseYear DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getGameById($id)
    {
        $mysqli = getDbConnection();
        $stmt = $mysqli->prepare("SELECT * FROM games WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function getGameByTitle($title)
    {
        $mysqli = getDbConnection();
        $stmt = $mysqli->prepare("SELECT * FROM games WHERE title = ?");
        $stmt->bind_param('s', $title);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function getFilteredGames($filters = [])
    {
        $mysqli = getDbConnection();

        $sql = "SELECT * FROM games WHERE 1=1";
        $types = "";
        $bindParams = [];

        if (!empty($filters['year'])) {
            $sql .= " AND releaseYear = ?";
            $types .= "i";
            $bindParams[] = $filters['year'];
        }

        if (!empty($filters['difficulty'])) {
            $sql .= " AND difficulty = ?";
            $types .= "i";
            $bindParams[] = $filters['difficulty'];
        }

        if (!empty($filters['genre'])) {
            $sql .= " AND genre = ?";
            $types .= "s";
            $bindParams[] = $filters['genre'];
        }

        if (!empty($filters['playerCount'])) {
            $sql .= " AND playerCount = ?";
            $types .= "i";
            $bindParams[] = $filters['playerCount'];
        }

        if (isset($filters['favorite']) && $filters['favorite'] === true) {
            $sql .= " AND favorite = 1";
        }

        if (!empty($filters['sort']) && strpos($filters['sort'], '-') !== false) {
            list($column, $direction) = explode('-', $filters['sort']);
            $sql .= " ORDER BY " . $column . " " . ($direction == 'desc' ? 'DESC' : 'ASC');
        } else {
            $sql .= " ORDER BY releaseYear DESC";
        }

        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            error_log("Chyba přípravy SQL dotazu: " . $mysqli->error);
            error_log("SQL dotaz: " . $sql);
            return [];
        }

        if (!empty($bindParams)) {
            $stmt->bind_param($types, ...$bindParams);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function toggleFavorite($id)
    {
        $mysqli = getDbConnection();
        $stmt = $mysqli->prepare("UPDATE games SET favorite = NOT favorite WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public static function createGame($data)
    {
        $mysqli = getDbConnection();

        $stmt = $mysqli->prepare("INSERT INTO games (title, description, rules, image, favorite, releaseYear, difficulty, genre, playerCount, reviewScore) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            'ssssiissdi',
            $data['title'],
            $data['description'],
            $data['rules'],
            $data['image'],
            $data['favorite'],
            $data['releaseYear'],
            $data['difficulty'],
            $data['genre'],
            $data['playerCount'],
            $data['reviewScore']
        );

        return $stmt->execute();
    }

    public static function updateGame($id, $data)
    {
        $mysqli = getDbConnection();

        $stmt = $mysqli->prepare("UPDATE games 
                                   SET title = ?, description = ?, rules = ?, image = ?, 
                                       favorite = ?, releaseYear = ?, difficulty = ?, 
                                       genre = ?, playerCount = ?, reviewScore = ? 
                                   WHERE id = ?");

        $stmt->bind_param(
            'ssssiissdii',
            $data['title'],
            $data['description'],
            $data['rules'],
            $data['image'],
            $data['favorite'],
            $data['releaseYear'],
            $data['difficulty'],
            $data['genre'],
            $data['playerCount'],
            $data['reviewScore'],
            $id
        );

        return $stmt->execute();
    }

    public static function deleteGame($id)
    {
        $mysqli = getDbConnection();

        $stmt = $mysqli->prepare("DELETE FROM game_images WHERE game_id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt = $mysqli->prepare("DELETE FROM games WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}