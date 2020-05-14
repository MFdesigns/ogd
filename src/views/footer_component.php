<?php
/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/
?>

<footer>
  <div class="footer__imprint">
    <h2 class="imprint__title">Impressum</h2>
    <p class="imprint__text">Die Daten auf dieser Website wurden durch OGD Schweiz und der Kantonale Verwaltung Thurgau bereitgestellt.</p>
    <ul class="imprint__list">
      <li>
        <a class="imprint__link" href="https://opendata.swiss/de/dataset/lernende-der-mittelschulen-kanton-thurgau">
          <img class="imprint__link__icon" src="/res/opendata_icon.svg" alt="">
          OGD Datensatz
        </a>
      </li>
      <li>
        <a class="imprint__link" href="https://github.com/MFdesigns/ogd">
          <img class="imprint__link__icon" src="/res/github_icon.svg" alt="">
          Source Code
        </a>
      </li>
    </ul>
    <label for="lang-select">Sprache</label>
    <select id="lang-select" class="footer__lang select">
      <option value="<?php echo "/de/" . CURRENT_PAGE; ?>" <?php if (LANG == "de") echo "selected"; ?>>Deutsch</option>
      <option value="<?php echo "/fr/" . CURRENT_PAGE; ?>" <?php if (LANG == "fr") echo "selected"; ?>>Français</option>
      <option value="<?php echo "/en/" . CURRENT_PAGE; ?>" <?php if (LANG == "en") echo "selected"; ?>>English</option>
      <option value="<?php echo "/it/" . CURRENT_PAGE; ?>" <?php if (LANG == "it") echo "selected"; ?>>Italiano</option>
    </select>
  </div>
  <p class="footer__copyright">Copyright &copy 2020 Michel Fäh und Dario Romandini</p>
</footer>
