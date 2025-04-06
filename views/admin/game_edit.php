<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php?page=admin_login');
    exit;
}

require_once 'models/Game.php';

$pageTitle = 'Úprava deskovky';
$isEdit = false;
$game = [
    'id' => '',
    'title' => '',
    'description' => '',
    'rules' => '',
    'image' => '',
    'favorite' => 0,
    'releaseYear' => date('Y'),
    'difficulty' => 1,
    'genre' => '',
    'playerCount' => 2,
    'reviewScore' => 7.0
];

if (isset($_GET['id'])) {
    $gameId = (int)$_GET['id'];
    $loadedGame = Game::getGameById($gameId);

    if ($loadedGame) {
        $isEdit = true;
        $game = $loadedGame;
        $pageTitle = 'Úprava deskovky: ' . htmlspecialchars($game['title']);
    }
}

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gameData = [
        'title' => $_POST['title'] ?? '',
        'description' => $_POST['description'] ?? '',
        'rules' => $_POST['rules'] ?? '',
        'favorite' => isset($_POST['favorite']) ? 1 : 0,
        'releaseYear' => (int)($_POST['releaseYear'] ?? date('Y')),
        'difficulty' => (int)($_POST['difficulty'] ?? 1),
        'genre' => $_POST['genre'] ?? '',
        'playerCount' => (int)($_POST['playerCount'] ?? 2),
        'reviewScore' => (float)($_POST['reviewScore'] ?? 7.0)
    ];

    $uploadImage = false;
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $uploadImage = true;
        $targetDir = "assets/images/games/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $gameData['image'] = $fileName;
            } else {
                $error = "Došlo k chybě při nahrávání souboru.";
            }
        } else {
            $error = "Pouze JPG, JPEG, PNG a GIF soubory jsou povoleny.";
        }
    } else if ($isEdit) {
        $gameData['image'] = $game['image'];
    } else {
        $error = "Prosím vyberte obrázek.";
    }

    if (empty($error)) {
        if ($isEdit) {
            $result = Game::updateGame($game['id'], $gameData);
            if ($result) {
                $success = true;
                $game = Game::getGameById($game['id']);
            } else {
                $error = "Nepodařilo se aktualizovat hru.";
            }
        } else {
            $result = Game::createGame($gameData);
            if ($result) {
                $success = true;
                header('Location: index.php?page=admin_games&added=1');
                exit;
            } else {
                $error = "Nepodařilo se přidat novou hru.";
            }
        }
    }
}

include 'includes/header.php';
?>

    <main>
        <div class="container">
            <div class="card bg-dark" style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                    <h1><?= $isEdit ? 'Úprava deskovky' : 'Přidání deskovky' ?></h1>
                    <div>
                        <a href="index.php?page=admin_games" class="navbar__item bg-primary" style="display: inline-block;">
                            <i class="navbar__item__icon material-icons">arrow_back</i>Zpět na seznam
                        </a>
                    </div>
                </div>
            </div>

            <?php if ($success): ?>
                <div style="background-color: #4CAF50; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: white;">
                    Deskovka byla úspěšně uložena.
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div style="background-color: #f44336; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: white;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <div class="card bg-dark">
                <form method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
                    <!-- Základní informace -->
                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <div style="flex: 2; min-width: 300px;">
                            <label for="title">Název *</label>
                            <input type="text" id="title" name="title" required value="<?= htmlspecialchars($game['title']) ?>"
                                   style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                        </div>

                        <div style="flex: 1; min-width: 150px;">
                            <label for="releaseYear">Rok vydání *</label>
                            <input type="number" id="releaseYear" name="releaseYear" required min="1900" max="2100" value="<?= $game['releaseYear'] ?>"
                                   style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                        </div>

                        <div style="flex: 1; min-width: 150px;">
                            <label for="difficulty">Obtížnost (1-5) *</label>
                            <input type="number" id="difficulty" name="difficulty" required min="1" max="5" value="<?= $game['difficulty'] ?>"
                                   style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                        </div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <div style="flex: 1; min-width: 200px;">
                            <label for="genre">Žánr *</label>
                            <input type="text" id="genre" name="genre" required value="<?= htmlspecialchars($game['genre']) ?>"
                                   style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                        </div>

                        <div style="flex: 1; min-width: 200px;">
                            <label for="playerCount">Maximální počet hráčů *</label>
                            <input type="number" id="playerCount" name="playerCount" required min="1" max="12" value="<?= $game['playerCount'] ?>"
                                   style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                        </div>

                        <div style="flex: 1; min-width: 200px;">
                            <label for="reviewScore">Hodnocení (0-10) *</label>
                            <input type="number" id="reviewScore" name="reviewScore" required min="0" max="10" step="0.1" value="<?= $game['reviewScore'] ?>"
                                   style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                        </div>
                    </div>

                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" id="favorite" name="favorite" <?= $game['favorite'] ? 'checked' : '' ?>
                               style="margin-right: 10px; width: 20px; height: 20px;">
                        <label for="favorite">Označit jako oblíbenou</label>
                    </div>

                    <!-- Popis -->
                    <div>
                        <label for="description">Popis *</label>
                        <textarea id="description" name="description" required rows="6"
                                  style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;"><?= htmlspecialchars($game['description']) ?></textarea>
                    </div>

                    <!-- Pravidla -->
                    <div>
                        <label for="rules">Pravidla *</label>
                        <textarea id="rules" name="rules" required rows="8"
                                  style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;"><?= htmlspecialchars($game['rules']) ?></textarea>
                    </div>

                    <!-- Obrázek -->
                    <div>
                        <label for="image">Obrázek <?= $isEdit ? '' : '*' ?></label>
                        <?php if ($isEdit && !empty($game['image'])): ?>
                            <div style="margin: 10px 0;">
                                <img src="assets/images/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>"
                                     style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" id="image" name="image" <?= $isEdit ? '' : 'required' ?> accept="image/*"
                               style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                    </div>

                    <!-- Tlačítka -->
                    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <a href="index.php?page=admin_games" class="navbar__item bg-gray" style="display: inline-block;">
                            Zrušit
                        </a>
                        <button type="submit" class="navbar__item bg-primary" style="border: none; cursor: pointer;">
                            <i class="navbar__item__icon material-icons"><?= $isEdit ? 'save' : 'add' ?></i>
                            <?= $isEdit ? 'Uložit změny' : 'Přidat deskovku' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>