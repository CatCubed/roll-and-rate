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

        if (!empty($filters['sort'])) {
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
            $bindParamsReferences = [];
            foreach ($bindParams as $key => $value) {
                $bindParamsReferences[$key] = &$bindParams[$key];
            }
            array_unshift($bindParamsReferences, $types);
            call_user_func_array([$stmt, 'bind_param'], $bindParamsReferences);
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
}

?>