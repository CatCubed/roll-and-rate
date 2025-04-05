const currentPath = window.location.pathname.split('/').pop();
const navItems = document.querySelectorAll('.navbar__item');

navItems.forEach(item => {
    if (item.getAttribute('href') === currentPath) {
        item.classList.add('navbar__item--selected');
    }
});
