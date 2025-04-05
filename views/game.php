<?php

use models\Game;

require_once 'models/Game.php';

$title = isset($_GET['title']) ? $_GET['title'] : null;

if ($title) {
    $game = Game::getGameByTitle($title);
} else {
    header('Location: index.php?page=home');
    exit;
}

if (!$game) {
    header('HTTP/1.0 404 Not Found');
    include 'views/404.php';
    exit;
}

$pageTitle = $game['title'];

include 'includes/header.php';
include 'includes/navbar.php';
?>

    <main>
        <section class="game_details">
            <div class="game_details__main">
                <img src="assets/images/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                <div class="game_details__info">
                    <h1><?= htmlspecialchars($game['title']) ?></h1>
                    <p><strong>Rok vydání:</strong> <?= htmlspecialchars($game['releaseYear']) ?></p>
                    <p><strong>Obtížnost:</strong> <?= htmlspecialchars($game['difficulty']) ?></p>
                    <p><strong>Žánr:</strong> <?= htmlspecialchars($game['genre']) ?></p>
                    <p><strong>Maximální počet hráčů:</strong> <?= htmlspecialchars($game['playerCount']) ?></p>
                </div>
                <div class="game_details__rating">
                    <span class="game_details__rating__star">⭐</span>
                    <span><?= number_format($game['reviewScore'], 1) ?></span>
                </div>
            </div>
            <div class="game_details__description">
                <p><strong>Popis:</strong> <?= nl2br(htmlspecialchars($game['description'])) ?></p>
            </div>
            <div class="game_details__rules">
                <p><strong>Pravidla:</strong> <?= nl2br(htmlspecialchars($game['rules'])) ?></p>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>