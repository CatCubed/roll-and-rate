<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php?page=admin_login');
    exit;
}

$pageTitle = 'Správa recenzí';
include 'includes/header.php';

require_once 'models/Review.php';
$reviews = Review::getAllReviews();

$deleteSuccess = false;
$deleteError = '';
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $reviewId = (int)$_GET['id'];
    $result = Review::deleteReview($reviewId);

    if ($result) {
        $deleteSuccess = true;
        $reviews = Review::getAllReviews();
    } else {
        $deleteError = 'Nepodařilo se smazat recenzi.';
    }
}
?>

    <main>
        <div class="container">
            <div class="card bg-dark" style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                    <h1>Správa recenzí</h1>
                    <div>
                        <a href="index.php?page=admin_review_edit" class="navbar__item bg-primary" style="display: inline-block;">
                            <i class="navbar__item__icon material-icons">add</i>Přidat novou
                        </a>
                        <a href="index.php?page=admin" class="navbar__item bg-primary" style="display: inline-block; margin-left: 10px;">
                            <i class="navbar__item__icon material-icons">dashboard</i>Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <?php if ($deleteSuccess): ?>
                <div style="background-color: #4CAF50; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: white;">
                    Recenze byla úspěšně odstraněna.
                </div>
            <?php endif; ?>

            <?php if ($deleteError): ?>
                <div style="background-color: #f44336; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: white;">
                    <?= htmlspecialchars($deleteError) ?>
                </div>
            <?php endif; ?>

            <div class="card bg-dark" style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; color: white;">
                    <thead>
                    <tr style="border-bottom: 1px solid #7716DF;">
                        <th style="padding: 12px 8px; text-align: left;">ID</th>
                        <th style="padding: 12px 8px; text-align: left;">Obrázek</th>
                        <th style="padding: 12px 8px; text-align: left;">Název</th>
                        <th style="padding: 12px 8px; text-align: left;">Text (začátek)</th>
                        <th style="padding: 12px 8px; text-align: center;">Akce</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($reviews as $review): ?>
                        <tr style="border-bottom: 1px solid #333;">
                            <td style="padding: 12px 8px;"><?= $review['id'] ?></td>
                            <td style="padding: 12px 8px;">
                                <img src="assets/images/reviews/<?= htmlspecialchars($review['image']) ?>" alt="<?= htmlspecialchars($review['title']) ?>"
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td style="padding: 12px 8px;"><?= htmlspecialchars($review['title']) ?></td>
                            <td style="padding: 12px 8px;"><?= htmlspecialchars(substr($review['text'], 0, 100)) ?>...</td>
                            <td style="padding: 12px 8px; text-align: center;">
                                <a href="index.php?page=admin_review_edit&id=<?= $review['id'] ?>" style="color: #C188FF; margin-right: 10px;">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="javascript:void(0);" onclick="confirmDelete(<?= $review['id'] ?>, '<?= htmlspecialchars(addslashes($review['title'])) ?>')"
                                   style="color: #f44336;">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($reviews)): ?>
                        <tr>
                            <td colspan="5" style="padding: 20px; text-align: center;">Žádné recenze nebyly nalezeny.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function confirmDelete(id, title) {
            if (confirm('Opravdu chcete smazat recenzi "' + title + '"?')) {
                window.location.href = 'index.php?page=admin_reviews&action=delete&id=' + id;
            }
        }
    </script>

<?php include 'includes/footer.php'; ?>