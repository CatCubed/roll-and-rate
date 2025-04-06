<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php?page=admin_login');
    exit;
}

require_once 'models/Review.php';

$pageTitle = 'Úprava recenze';
$isEdit = false;
$review = [
    'id' => '',
    'title' => '',
    'text' => '',
    'image' => ''
];

if (isset($_GET['id'])) {
    $reviewId = (int)$_GET['id'];
    $loadedReview = Review::getReviewById($reviewId);

    if ($loadedReview) {
        $isEdit = true;
        $review = $loadedReview;
        $pageTitle = 'Úprava recenze: ' . htmlspecialchars($review['title']);
    }
}

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewData = [
        'title' => $_POST['title'] ?? '',
        'text' => $_POST['text'] ?? ''
    ];

    $uploadImage = false;
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $uploadImage = true;
        $targetDir = "assets/images/reviews/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $reviewData['image'] = $fileName;
            } else {
                $error = "Došlo k chybě při nahrávání souboru.";
            }
        } else {
            $error = "Pouze JPG, JPEG, PNG a GIF soubory jsou povoleny.";
        }
    } else if ($isEdit) {
        $reviewData['image'] = $review['image'];
    } else {
        $error = "Prosím vyberte obrázek.";
    }

    if (empty($error)) {
        if ($isEdit) {
            $result = Review::updateReview($review['id'], $reviewData);
            if ($result) {
                $success = true;
                $review = Review::getReviewById($review['id']);
            } else {
                $error = "Nepodařilo se aktualizovat recenzi.";
            }
        } else {
            $result = Review::createReview($reviewData);
            if ($result) {
                $success = true;
                header('Location: index.php?page=admin_reviews&added=1');
                exit;
            } else {
                $error = "Nepodařilo se přidat novou recenzi.";
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
                    <h1><?= $isEdit ? 'Úprava recenze' : 'Přidání recenze' ?></h1>
                    <div>
                        <a href="index.php?page=admin_reviews" class="navbar__item bg-primary" style="display: inline-block;">
                            <i class="navbar__item__icon material-icons">arrow_back</i>Zpět na seznam
                        </a>
                    </div>
                </div>
            </div>

            <?php if ($success): ?>
                <div style="background-color: #4CAF50; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: white;">
                    Recenze byla úspěšně uložena.
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
                    <div>
                        <label for="title">Název recenze *</label>
                        <input type="text" id="title" name="title" required value="<?= htmlspecialchars($review['title']) ?>"
                               style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                    </div>

                    <!-- Text recenze -->
                    <div>
                        <label for="text">Text recenze *</label>
                        <textarea id="text" name="text" required rows="15"
                                  style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;"><?= htmlspecialchars($review['text']) ?></textarea>
                    </div>

                    <!-- Obrázek -->
                    <div>
                        <label for="image">Obrázek <?= $isEdit ? '' : '*' ?></label>
                        <?php if ($isEdit && !empty($review['image'])): ?>
                            <div style="margin: 10px 0;">
                                <img src="assets/images/reviews/<?= htmlspecialchars($review['image']) ?>" alt="<?= htmlspecialchars($review['title']) ?>"
                                     style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" id="image" name="image" <?= $isEdit ? '' : 'required' ?> accept="image/*"
                               style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                    </div>

                    <!-- Tlačítka -->
                    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <a href="index.php?page=admin_reviews" class="navbar__item bg-gray" style="display: inline-block;">
                            Zrušit
                        </a>
                        <button type="submit" class="navbar__item bg-primary" style="border: none; cursor: pointer;">
                            <i class="navbar__item__icon material-icons"><?= $isEdit ? 'save' : 'add' ?></i>
                            <?= $isEdit ? 'Uložit změny' : 'Přidat recenzi' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>