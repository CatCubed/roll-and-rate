<?php
require_once 'models/Game.php';

$newReleases = Game::getFilteredGames(['sort' => 'releaseYear-desc']);
$upcomingGames = Game::getAllGames();
$topGames2024 = Game::getFilteredGames([
    'year' => 2024,
    'sort' => 'reviewScore-desc'
]);

$pageTitle = 'Domů';

include 'includes/header.php';
include 'includes/navbar.php';
?>

    <main>
        <section class="container">
            <section id="game-section-new-releases" class="card bg-dark slider__parent">
                <h2 class="slider__title">Nové deskovky</h2>
                <?php foreach ($newReleases as $game): ?>
                    <a class="game_section__item" href="index.php?page=game&title=<?= urlencode($game['title']) ?>">
                        <img src="assets/images/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                        <div class="game_section__item__text"><?= htmlspecialchars($game['title']) ?></div>
                    </a>
                <?php endforeach; ?>
            </section>

            <section id="game-section-upcoming" class="card bg-dark slider__parent">
                <h2 class="slider__title">Nadcházející</h2>
                <?php foreach ($upcomingGames as $game): ?>
                    <a class="game_section__item" href="index.php?page=game&title=<?= urlencode($game['title']) ?>">
                        <img src="assets/images/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                        <div class="game_section__item__text"><?= htmlspecialchars($game['title']) ?></div>
                    </a>
                <?php endforeach; ?>
            </section>

            <section id="game-section-top-2024" class="card bg-dark slider__parent">
                <h2 class="slider__title">Top z roku 2024</h2>
                <?php foreach ($topGames2024 as $game): ?>
                    <a class="game_section__item" href="index.php?page=game&title=<?= urlencode($game['title']) ?>">
                        <img src="assets/images/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                        <div class="game_section__item__text"><?= htmlspecialchars($game['title']) ?></div>
                    </a>
                <?php endforeach; ?>
            </section>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>