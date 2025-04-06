<?php
require_once 'models/Game.php';

$year = isset($_GET['year']) ? $_GET['year'] : '';
$difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : '';
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$playerCount = isset($_GET['playerCount']) ? $_GET['playerCount'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

$filters = [
    'year' => $year,
    'difficulty' => $difficulty,
    'genre' => $genre,
    'playerCount' => $playerCount,
    'sort' => $sort
];
$games = Game::getFilteredGames($filters);

$allGames = Game::getAllGames();
$years = array_unique(array_column($allGames, 'releaseYear'));
$difficulties = array_unique(array_column($allGames, 'difficulty'));
$genres = array_unique(array_column($allGames, 'genre'));
$playerCounts = array_unique(array_column($allGames, 'playerCount'));

// Nastavení titulku stránky
$pageTitle = 'Procházet';

include 'includes/header.php';
include 'includes/navbar.php';
?>

    <main>
        <div class="browse__filter_container" id="controls">
            <label for="filterYear">Rok vydání</label>
            <select id="filterYear" onchange="this.form.submit();" name="year">
                <option value="">Rok vydání</option>
                <?php foreach ($years as $yearOption): ?>
                    <option value="<?= $yearOption ?>" <?= $year == $yearOption ? 'selected' : '' ?>><?= $yearOption ?></option>
                <?php endforeach; ?>
            </select>

            <label for="filterDifficulty">Obtížnost</label>
            <select id="filterDifficulty" onchange="this.form.submit();" name="difficulty">
                <option value="">Obtížnost</option>
                <?php foreach ($difficulties as $diffOption): ?>
                    <option value="<?= $diffOption ?>" <?= $difficulty == $diffOption ? 'selected' : '' ?>><?= $diffOption ?></option>
                <?php endforeach; ?>
            </select>

            <label for="filterGenre">Žánr</label>
            <select id="filterGenre" onchange="this.form.submit();" name="genre">
                <option value="">Žánr</option>
                <?php foreach ($genres as $genreOption): ?>
                    <option value="<?= $genreOption ?>" <?= $genre == $genreOption ? 'selected' : '' ?>><?= $genreOption ?></option>
                <?php endforeach; ?>
            </select>

            <label for="filterPlayerCount">Max. počet hráčů</label>
            <select id="filterPlayerCount" onchange="this.form.submit();" name="playerCount">
                <option value="">Max. počet hráčů</option>
                <?php foreach ($playerCounts as $countOption): ?>
                    <option value="<?= $countOption ?>" <?= $playerCount == $countOption ? 'selected' : '' ?>><?= $countOption ?></option>
                <?php endforeach; ?>
            </select>

            <label for="sortCriteria">Řazení</label>
            <select id="sortCriteria" onchange="this.form.submit();" name="sort">
                <option value="none">Řazení</option>
                <option value="title-asc" <?= $sort == 'title-asc' ? 'selected' : '' ?>>Podle názvu (A-Z)</option>
                <option value="title-desc" <?= $sort == 'title-desc' ? 'selected' : '' ?>>Podle názvu (Z-A)</option>
                <option value="releaseYear-asc" <?= $sort == 'releaseYear-asc' ? 'selected' : '' ?>>Rok vydání
                    (Vzestupně)
                </option>
                <option value="releaseYear-desc" <?= $sort == 'releaseYear-desc' ? 'selected' : '' ?>>Rok vydání
                    (Sestupně)
                </option>
                <option value="difficulty-asc" <?= $sort == 'difficulty-asc' ? 'selected' : '' ?>>Obtížnost
                    (Vzestupně)
                </option>
                <option value="difficulty-desc" <?= $sort == 'difficulty-desc' ? 'selected' : '' ?>>Obtížnost
                    (Sestupně)
                </option>
                <option value="playerCount-asc" <?= $sort == 'playerCount-asc' ? 'selected' : '' ?>>Maximální počet
                    hráčů (Vzestupně)
                </option>
                <option value="playerCount-desc" <?= $sort == 'playerCount-desc' ? 'selected' : '' ?>>Maximální počet
                    hráčů (Sestupně)
                </option>
                <option value="reviewScore-asc" <?= $sort == 'reviewScore-asc' ? 'selected' : '' ?>>Hodnocení
                    (Vzestupně)
                </option>
                <option value="reviewScore-desc" <?= $sort == 'reviewScore-desc' ? 'selected' : '' ?>>Hodnocení
                    (Sestupně)
                </option>
                <option value="favorite-desc" <?= $sort == 'favorite-desc' ? 'selected' : '' ?>>Oblíbené hry první
                </option>
            </select>
        </div>

        <div class="browse__game_container" id="gameContainer">
            <?php foreach ($games as $game): ?>
                <a href="index.php?page=game&title=<?= urlencode($game['title']) ?>">
                    <img width="90" height="120" src="assets/images/games/<?= htmlspecialchars($game['image']) ?>"
                         alt="<?= htmlspecialchars($game['title']) ?>">
                    <div class="game_details__rating">
                        <span class="game_details__rating__star">⭐</span>
                        <span><?= number_format($game['reviewScore'], 1) ?></span>
                    </div>
                    <h2><?= htmlspecialchars($game['title']) ?></h2>
                    <h3>Rok vydání: <?= htmlspecialchars($game['releaseYear']) ?></h3>
                    <h3>Obtížnost: <?= htmlspecialchars($game['difficulty']) ?></h3>
                    <h3>Žánr: <?= htmlspecialchars($game['genre']) ?></h3>
                    <h3>Max. počet hráčů: <?= htmlspecialchars($game['playerCount']) ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

    <script>
        // JavaScript pro automatické odesílání formuláře při změně filtru
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('select');
            selects.forEach(select => {
                select.addEventListener('change', function () {
                    window.location.href = 'index.php?page=browse&year=' + document.getElementById('filterYear').value +
                        '&difficulty=' + document.getElementById('filterDifficulty').value +
                        '&genre=' + document.getElementById('filterGenre').value +
                        '&playerCount=' + document.getElementById('filterPlayerCount').value +
                        '&sort=' + document.getElementById('sortCriteria').value;
                });
            });
        });
    </script>

<?php include 'includes/footer.php'; ?>