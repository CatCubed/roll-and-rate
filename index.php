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
    default:
        header('HTTP/1.0 404 Not Found');
        require 'views/404.php';
        break;
}
?>