<?php
require_once 'config.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        require 'views/home.php';
        break;
    case 'reviews':
        require 'views/reviews.php';
        break;
    case 'review-details':
        require 'views/review-details.php';
        break;
    case 'game':
        require 'views/game.php';
        break;
    case 'browse':
        require 'views/browse.php';
        break;
    case 'wishlist':
        require 'views/wishlist.php';
        break;

    case 'admin_login':
        require 'views/admin/login.php';
        break;
    case 'admin':
        require 'views/admin/dashboard.php';
        break;
    case 'admin_games':
        require 'views/admin/games.php';
        break;
    case 'admin_game_edit':
        require 'views/admin/game_edit.php';
        break;
    case 'admin_reviews':
        require 'views/admin/reviews.php';
        break;
    case 'admin_review_edit':
        require 'views/admin/review_edit.php';
        break;
    case 'admin_logout':
        require 'views/admin/logout.php';
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        require 'views/404.php';
        break;
}
?>