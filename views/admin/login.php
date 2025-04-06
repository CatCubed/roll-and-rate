<?php
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php?page=admin');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: index.php?page=admin');
        exit;
    } else {
        $error = 'Nesprávné uživatelské jméno nebo heslo.';
    }
}

$pageTitle = 'Admin Přihlášení';
include 'includes/header.php';
?>

    <main>
        <div class="container" style="max-width: 400px; margin: 100px auto;">
            <div class="card bg-dark">
                <h1 style="text-align: center;">Administrace</h1>
                <h2 style="text-align: center;">Roll & Rate</h2>

                <?php if ($error): ?>
                    <div style="background-color: #7716DF; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: white; text-align: center;">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="" style="display: flex; flex-direction: column; gap: 15px;">
                    <div>
                        <label for="username">Uživatelské jméno:</label>
                        <input type="text" id="username" name="username" required
                               style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                    </div>

                    <div>
                        <label for="password">Heslo:</label>
                        <input type="password" id="password" name="password" required
                               style="width: 100%; padding: 8px; border-radius: 5px; margin-top: 5px; background-color: #1E0638; color: white; border: 1px solid #C188FF;">
                    </div>

                    <button type="submit"
                            style="background-color: #7716DF; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; font-family: 'Jaini', serif; font-size: 20px; margin-top: 10px;">
                        Přihlásit se
                    </button>
                </form>

                <div style="text-align: center; margin-top: 20px;">
                    <a href="index.php" class="navbar__item bg-primary" style="display: inline-block;">
                        <i class="navbar__item__icon material-icons">home</i>Zpět na web
                    </a>
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>