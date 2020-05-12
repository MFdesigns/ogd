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
  <script src="./js/yearlyReports.js" type="module" defer></script>
</head>
<body>

  <header>
    <div class="title">
      <div class="header">
        <img class="header__icon" src="./res/header_icon.svg" alt="">
        <h1 class="header__title">Lernende der Mittelschulen des Kantons Thurgau</h1>
      </div>
    </div>
    <nav>
      <div class="nav">
        <a class="nav__item" href="/index.php">
          <p class="nav__item__text">Jahresreport</p>
        </a>
        <a class="nav__item" href="/jahresübersicht.php">
          <p class="nav__item__text">Jahresübersicht</p>
        </a>
      </div>
    </nav>
  </header>


  <main>
    <h1>Jahresreport</h1>

    <select name="" class="year-select">
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

    <canvas class="gender-chart"></canvas>
    <canvas class="level-chart"></canvas>
    <canvas class="type-chart"></canvas>
    <canvas class="country-chart"></canvas>
  </main>

  <footer>
    <div class="imprint">
      <p>Die Daten auf dieser Website wurden durch OGD Schweiz und der Kantonale Verwaltung Thurgau bereitgestellt.</p>
      <a href="https://opendata.swiss/de/dataset/lernende-der-mittelschulen-kanton-thurgau">OGD Datensatz</a>
      <a href="https://github.com/MFdesigns/ogd">Source Code</a>
    </div>
    <p>Copyright (c) 2020 Michel Fäh und Dario Romandini</p>
  </footer>

</body>
</html>
