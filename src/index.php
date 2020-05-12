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
  <link rel="stylesheet" href="./css/yearly_report_style.css">
  <script src="./js/yearlyReports.js" type="module" defer></script>
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
        <a class="nav__item nav__item--selected" href="/index.php">
          <p class="nav__item__text">Jahresreport</p>
        </a>
        <a class="nav__item" href="/jahresübersicht.php">
          <p class="nav__item__text">Jahresübersicht</p>
        </a>
      </div>
    </nav>
  </header>


  <main>

    <div class="banner">
      <div class="banner__header">
        <h1>Jahresreport</h1>
        <p>Der Jahresreport zeigt relevante Statistiken zum selektierten Jahr an.</p>
      </div>
      <div class="banner__selection">
        <label for="year-select">Jahr</label>
        <select name="" id="year-select">
          <option value="2007/2008">2007/2008</option>
          <option value="2008/2009">2008/2009</option>
          <option value="2009/2010">2009/2010</option>
          <option value="2010/2011">2010/2011</option>
          <option value="2011/2012">2011/2012</option>
          <option value="2012/2013">2012/2013</option>
          <option value="2013/2014">2013/2014</option>
          <option value="2014/2015">2014/2015</option>
          <option value="2015/2016">2015/2016</option>
          <option value="2016/2017">2016/2017</option>
          <option value="2017/2018">2017/2018</option>
          <option value="2018/2019">2018/2019</option>
        </select>
      </div>
    </div>

    <div class="chart gender-chart">
      <h2 class="chart__title">Geschlecht</h2>
      <div class="chart__container">
        <canvas class="gender-chart-canvas"></canvas>
      </div>
    </div>
    <div class="chart level-chart">
      <h2 class="chart__title">Stufe</h2>
      <div class="chart__container">
        <canvas class="level-chart-canvas"></canvas>
      </div>
    </div>
    <div class="chart type-chart">
      <h2 class="chart__title">Typ</h2>
      <div class="chart__container">
        <canvas class="type-chart-canvas"></canvas>
      </div>
    </div>
    <div class="chart country-chart">
      <h2 class="chart__title">Land</h2>
      <div class="chart__container">
        <canvas class="country-chart-canvas"></canvas>
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
