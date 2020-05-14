<!--
  Copyright (c) 2020 Michel Fäh, Dario Romandini
  -->

<!DOCTYPE html>
<html lang="<?php echo LANG; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Michel Fäh, Dario Romandini">
  <!-- TODO: Add description meta data -->
  <meta name="description" content="">
  <title>Lernende Mittelschulen TG | <?php echo PAGE_TITLE; ?></title>

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/res/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/res/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/res/favicons/favicon-16x16.png">
  <link rel="manifest" href="/res/favicons/site.webmanifest">
  <link rel="mask-icon" href="/res/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/res/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/res/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- Styles -->
  <link rel="stylesheet" href="/css/general_styles.css">
  <link rel="stylesheet" href="/css/year_overview_style.css">

  <!-- Scripts -->
  <script src="/js/footer.js" defer></script>
  <script src="/js/yearOverview.js" type="module" defer></script>

</head>
<body>

  <!-- Header -->
  <?php require_once(ROOT . "/views/header_component.php"); ?>

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

  <!-- Footer -->
  <?php require_once(ROOT . "/views/footer_component.php"); ?>

</body>
</html>
