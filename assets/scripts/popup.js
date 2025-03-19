const btn = document.querySelector('.user-btn');
const menu = document.querySelector('.header__user-menu');

btn.addEventListener('click', (event) => {
    event.stopPropagation();
    menu.classList.toggle('hidden');
});

document.addEventListener('click', (event) => {
    const isClickInsideMenu = menu.contains(event.target);
    const isClickOnButton = btn.contains(event.target);

    if (!isClickInsideMenu && !isClickOnButton) {
        menu.classList.add('hidden');
    }
});