<?php
/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

// If current page var is empty means that this is the home page
// On the home page de language paramter cannot be followed by a "/"
// because that would lead to a 404 in the router so we remove it
// If this is the home page
if (empty(CURRENT_PAGE)) {
  define("DS", "");
} else {
  define("DS", "/");
}

?>

<footer>
  <!-- Imprint -->
  <div class="footer__imprint">
    <h2 class="imprint__title"><?php echo LANG_GEN["footer"][LANG]["title"] ?></h2>
    <p class="imprint__text"><?php echo LANG_GEN["footer"][LANG]["description"] ?></p>
    <ul class="imprint__list">
      <li>
        <a class="imprint__link" href="https://opendata.swiss/de/dataset/lernende-der-mittelschulen-kanton-thurgau">
          <img class="imprint__link__icon" src="/src/res/opendata_icon.svg">
          OGD Data
        </a>
      </li>
      <li>
        <a class="imprint__link" href="https://github.com/MFdesigns/ogd">
          <img class="imprint__link__icon" src="/src/res/github_icon.svg">
          Source Code
        </a>
      </li>
    </ul>

    <!-- Language selection -->
    <label for="lang-select"><?php echo LANG_GEN["footer"][LANG]["selectLang"] ?></label>
    <select id="lang-select" class="footer__lang select">
      <option value="<?php echo "/de" . DS . CURRENT_PAGE; ?>" <?php if (LANG == "de") echo "selected"; ?>>Deutsch</option>
      <option value="<?php echo "/fr" . DS . CURRENT_PAGE; ?>" <?php if (LANG == "fr") echo "selected"; ?>>Français</option>
      <option value="<?php echo "/en" . DS . CURRENT_PAGE; ?>" <?php if (LANG == "en") echo "selected"; ?>>English</option>
      <option value="<?php echo "/it" . DS . CURRENT_PAGE; ?>" <?php if (LANG == "it") echo "selected"; ?>>Italiano</option>
    </select>
  </div>

  <!-- Copyright -->
  <p class="footer__copyright">Copyright &copy 2020 Michel Fäh & Dario Romandini</p>
</footer>
