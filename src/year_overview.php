<!--
  Copyright (c) 2020 Michel Fäh, Dario Romandini
  -->

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Michel Fäh, Dario Romandini">
  <!-- TODO: Add description meta data -->
  <meta name="description" content="">
  <title>OGD Lernende Mittelschulen TG</title>
  <link rel="stylesheet" href="./css/general_styles.css">
  <link rel="stylesheet" href="./css/year_overview_style.css">
  <script src="./js/yearOverview.js" type="module" defer></script>
</head>
<body>

  <header>
    <div class="title">
      <div class="header">
        <img class="header__icon" src="./res/header_icon.svg" alt="">
        <h1 class="header__title">Lernende der Mittelschulen</h1>
      </div>
    </div>
    <nav>
      <div class="nav">
        <a class="nav__item" href="/index.php">
          <p class="nav__item__text">Jahresreport</p>
        </a>
        <a class="nav__item nav__item--selected" href="/year_overview.php">
          <p class="nav__item__text">Jahresübersicht</p>
        </a>
      </div>
    </nav>
  </header>

  <main>

    <div class="banner">
      <div class="banner__header">
        <h1>Jahresübersicht</h1>
        <p>Die Jahresübersicht zeigt relevante Statistiken über die ganzen Jahre hinweg an.</p>
      </div>
    </div>

    <div class="chart gender-chart">
      <h2 class="chart__title">Geschlecht</h2>
      <div class="chart__container">
        <canvas class="gender-chart-canvas"></canvas>
      </div>
    </div>

    <div class="chart country-chart">
      <h2 class="chart__title">Land</h2>
      <select name="" id="country-select" disabled></select>
      <div class="chart__container">
        <canvas class="country-chart-canvas"></canvas>
      </div>
    </div>

    <div class="chart type-chart">
      <h2 class="chart__title">Typ</h2>
      <div class="chart__container">
        <canvas class="type-chart-canvas"></canvas>
      </div>
    </div>

    <div class="chart level-chart">
      <h2 class="chart__title">Stufe</h2>
      <div class="chart__container">
        <canvas class="level-chart-canvas"></canvas>
      </div>
    </div>

  </main>

  <footer>
    <div class="footer__imprint">
      <h2 class="imprint__title">Impressum</h2>
      <p class="imprint__text">Die Daten auf dieser Website wurden durch OGD Schweiz und der Kantonale Verwaltung Thurgau bereitgestellt.</p>
      <ul class="imprint__list">
        <li>
          <a class="imprint__link" href="https://opendata.swiss/de/dataset/lernende-der-mittelschulen-kanton-thurgau">
            <img class="imprint__link__icon" src="./res/opendata_icon.svg" alt="">
            OGD Datensatz
          </a>
        </li>
        <li>
          <a class="imprint__link" href="https://github.com/MFdesigns/ogd">
            <img class="imprint__link__icon" src="./res/github_icon.svg" alt="">
            Source Code
          </a>
        </li>
      </ul>
    </div>
    <p class="footer__copyright">Copyright &copy 2020 Michel Fäh und Dario Romandini</p>
  </footer>

</body>
</html>
