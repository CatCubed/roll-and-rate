<?php
$pageTitle = '404 - Stránka nenalezena';
include 'includes/header.php';
include 'includes/navbar.php';
?>

    <main>
        <section class="container">
            <div style="text-align: center; padding: 50px;">
                <h1>404 - Stránka nenalezena</h1>
                <p>Omlouváme se, ale požadovaná stránka nebyla nalezena.</p>
                <a href="index.php" class="navbar__item bg-primary" style="display: inline-block; margin-top: 20px;">
                    <i class="navbar__item__icon material-icons">home</i>Zpět na domovskou stránku
                </a>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>