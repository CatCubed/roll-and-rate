<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php?page=admin_login');
    exit;
}

$pageTitle = 'Administrace';
include 'includes/header.php';

require_once 'models/Game.php';
require_once 'models/Review.php';

$gameCount = count(Game::getAllGames());
$reviewCount = count(Review::getAllReviews());
?>

    <main>
        <div class="container">
            <div class="card bg-dark" style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h1>Administrace</h1>
                    <div>
                        <a href="index.php?page=admin_logout" class="navbar__item bg-primary" style="display: inline-block;">
                            <i class="navbar__item__icon material-icons">exit_to_app</i>Odhlásit se
                        </a>
                    </div>
                </div>
                <p>Vítejte v administrační sekci, <?= htmlspecialchars($_SESSION['admin_username']) ?>.</p>
            </div>

            <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
                <div class="card bg-dark" style="flex: 1; min-width: 250px; text-align: center;">
                    <i class="material-icons" style="font-size: 48px; color: #C188FF;">games</i>
                    <h2><?= $gameCount ?></h2>
                    <p>Deskovky</p>
                </div>

                <div class="card bg-dark" style="flex: 1; min-width: 250px; text-align: center;">
                    <i class="material-icons" style="font-size: 48px; color: #C188FF;">rate_review</i>
                    <h2><?= $reviewCount ?></h2>
                    <p>Recenze</p>
                </div>
            </div>

            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <a href="index.php?page=admin_games" class="card bg-dark" style="flex: 1; min-width: 300px; text-decoration: none; color: white;">
                    <div style="display: flex; align-items: center;">
                        <i class="material-icons" style="font-size: 36px; margin-right: 15px; color: #C188FF;">games</i>
                        <div>
                            <h2>Spravovat deskovky</h2>
                            <p>Přidat, upravit nebo odebrat deskovky</p>
                        </div>
                    </div>
                </a>

                <a href="index.php?page=admin_reviews" class="card bg-dark" style="flex: 1; min-width: 300px; text-decoration: none; color: white;">
                    <div style="display: flex; align-items: center;">
                        <i class="material-icons" style="font-size: 36px; margin-right: 15px; color: #C188FF;">rate_review</i>
                        <div>
                            <h2>Spravovat recenze</h2>
                            <p>Přidat, upravit nebo odebrat recenze</p>
                        </div>
                    </div>
                </a>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <a href="index.php" class="navbar__item bg-primary" style="display: inline-block;">
                    <i class="navbar__item__icon material-icons">home</i>Zpět na web
                </a>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>