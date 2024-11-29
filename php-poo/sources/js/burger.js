const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.main-nav-links');

burger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});