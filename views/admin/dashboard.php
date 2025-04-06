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
        <div class="container" style="padding: 20px; max-width: 1000px; margin: 0 auto;">
            <div class="card bg-dark" style="padding: 20px; margin-bottom: 40px;">
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

            <div style="margin-bottom: 40px; overflow: hidden;">
                <div style="float: left; width: 48%; margin-right: 4%;">
                    <div class="card bg-dark" style="text-align: center; padding: 30px;">
                        <i class="material-icons" style="font-size: 52px; color: #C188FF; margin-bottom: 15px;">games</i>
                        <h2 style="margin-top: 0;"><?= $gameCount ?></h2>
                        <p style="font-size: 18px;">Deskovky</p>
                    </div>
                </div>

                <div style="float: left; width: 48%;">
                    <div class="card bg-dark" style="text-align: center; padding: 30px;">
                        <i class="material-icons" style="font-size: 52px; color: #C188FF; margin-bottom: 15px;">rate_review</i>
                        <h2 style="margin-top: 0;"><?= $reviewCount ?></h2>
                        <p style="font-size: 18px;">Recenze</p>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 40px; overflow: hidden; clear: both;">
                <div style="float: left; width: 48%; margin-right: 4%;">
                    <a href="index.php?page=admin_games" style="text-decoration: none; color: white; display: block;">
                        <div class="card bg-dark" style="padding: 30px;">
                            <div style="display: flex; align-items: center;">
                                <i class="material-icons" style="font-size: 40px; margin-right: 20px; color: #C188FF;">games</i>
                                <div>
                                    <h2 style="margin-top: 0; margin-bottom: 10px;">Spravovat deskovky</h2>
                                    <p style="margin: 0;">Přidat, upravit nebo odebrat deskovky</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div style="float: left; width: 48%;">
                    <a href="index.php?page=admin_reviews" style="text-decoration: none; color: white; display: block;">
                        <div class="card bg-dark" style="padding: 30px;">
                            <div style="display: flex; align-items: center;">
                                <i class="material-icons" style="font-size: 40px; margin-right: 20px; color: #C188FF;">rate_review</i>
                                <div>
                                    <h2 style="margin-top: 0; margin-bottom: 10px;">Spravovat recenze</h2>
                                    <p style="margin: 0;">Přidat, upravit nebo odebrat recenze</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div style="text-align: center; clear: both; padding-top: 20px;">
                <a href="index.php" class="navbar__item bg-primary" style="display: inline-block; padding: 10px 20px;">
                    <i class="navbar__item__icon material-icons">home</i>Zpět na web
                </a>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>