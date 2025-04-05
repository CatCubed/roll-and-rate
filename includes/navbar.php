<!-- NAVBAR - Desktop -->
<nav class="display-large bg-dark text-white navbar">
    <img width="191" height="40" class="navbar__logo" src="assets/images/logo.png" alt="logo">
    <a class="navbar__item bg-primary <?= $page == 'home' ? 'navbar__item--selected' : '' ?>" href="index.php?page=home">
        <i class="navbar__item__icon material-icons">home</i>Domů
    </a>
    <a class="navbar__item bg-primary <?= $page == 'reviews' ? 'navbar__item--selected' : '' ?>" href="index.php?page=reviews">
        <i class="navbar__item__icon material-icons">star</i>Recenze
    </a>
    <a class="navbar__item bg-primary <?= $page == 'browse' ? 'navbar__item--selected' : '' ?>" href="index.php?page=browse">
        <i class="navbar__item__icon material-icons">web</i>Procházet
    </a>
    <a class="navbar__item bg-primary <?= $page == 'wishlist' ? 'navbar__item--selected' : '' ?>" href="index.php?page=wishlist">
        <i class="navbar__item__icon material-icons">favorite</i>Oblíbené
    </a>
</nav>
<!-- NAVBAR - Desktop -->

<!-- NAVBAR - Mobile -->
<nav class="display-small bg-dark navbar">
    <a class="navbar__item bg-primary <?= $page == 'home' ? 'navbar__item--selected' : '' ?>" href="index.php?page=home">
        <i class="navbar__item__icon material-icons">home</i>
    </a>
    <a class="navbar__item bg-primary <?= $page == 'reviews' ? 'navbar__item--selected' : '' ?>" href="index.php?page=reviews">
        <i class="navbar__item__icon material-icons">star</i>
    </a>
    <a class="navbar__item bg-primary <?= $page == 'browse' ? 'navbar__item--selected' : '' ?>" href="index.php?page=browse">
        <i class="navbar__item__icon material-icons">web</i>
    </a>
    <a class="navbar__item bg-primary <?= $page == 'wishlist' ? 'navbar__item--selected' : '' ?>" href="index.php?page=wishlist">
        <i class="navbar__item__icon material-icons">favorite</i>
    </a>
</nav>
<!-- NAVBAR - Mobile -->