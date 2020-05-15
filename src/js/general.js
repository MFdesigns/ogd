/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

const langSelect = document.getElementsByClassName('footer__lang')[0];
const navOpenButton = document.getElementsByClassName('nav-open-button')[0];
const navCloseButton = document.getElementsByClassName('nav-close-button')[0];
const mobileNav = document.getElementsByClassName('mobile-nav-container')[0];

navOpenButton.addEventListener('click', () => {
  mobileNav.style.display = 'block';

  // Darken background and disable scroll when navbar is open
  document.body.classList.toggle('body-no-scroll', true);
});

navCloseButton.addEventListener('click', () => {
  mobileNav.style.display = 'none';
  // Remove dark background and enable scroll when navbar is closed
  document.body.classList.toggle('body-no-scroll', false);
});

langSelect.addEventListener('change', () => {
  window.location.href = langSelect.value;
});
