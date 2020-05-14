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
  <title>Lernende Mittelschulen TG | <?php echo PAGE_TITLE; ?></title>
  <link rel="stylesheet" href="/css/general_styles.css">
  <link rel="stylesheet" href="/css/year_overview_style.css">
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
