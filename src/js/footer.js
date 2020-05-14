/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

const langSelect = document.getElementsByClassName('footer__lang')[0];

langSelect.addEventListener('change', () => {
  window.location.href = langSelect.value;
});
