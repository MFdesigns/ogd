<!--
  Copyright (c) 2020 Michel Fäh, Dario Romandini
  -->

<?php

  // Get language file containing all texts from selected language
  $langFile = file_get_contents(ROOT . "/lang/" . LANG_FILE);
  $langData = json_decode($langFile, true);

?>

<!DOCTYPE html>
<html lang="<?php echo LANG; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Michel Fäh, Dario Romandini">
  <meta name="description" content="<?php echo $langData[LANG]["page"]["description"]; ?>">
  <title>Lernende Mittelschulen TG | <?php echo $langData[LANG]["page"]["title"]; ?></title>

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
  <link rel="stylesheet" href="/css/yearly_report_style.css">

  <!-- Scripts -->
  <script src="/js/footer.js" defer></script>
  <script src="/js/yearlyReports.js" type="module" defer></script>
</head>
<body>

  <!-- Header -->
  <?php require_once(ROOT . "/views/header_component.php"); ?>

  <main>

    <div class="banner">
      <div class="banner__header">
        <h1><?php echo $langData[LANG]["page"]["title"]; ?></h1>
        <p><?php echo $langData[LANG]["page"]["description"]; ?></p>
      </div>
      <div class="banner__selection">
        <label for="year-select">
          <?php echo $langData[LANG]["yearSelection"]; ?>
        </label>
        <select id="year-select" class="select">
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
      <div class="chart__header">
        <h2 class="chart__header__title">
          <?php echo $langData[LANG]["charts"]["gender"]["title"]; ?>
        </h2>
        <p>
          <?php echo $langData[LANG]["charts"]["gender"]["description"]; ?>
        </p>
      </div>
      <div class="chart__container">
        <canvas class="gender-chart-canvas"></canvas>
      </div>
    </div>

    <div class="chart level-chart">
      <div class="chart__header">
        <h2 class="chart__header__title">
          <?php echo $langData[LANG]["charts"]["level"]["title"]; ?>
        </h2>
        <p>
          <?php echo $langData[LANG]["charts"]["level"]["description"]; ?>
        </p>
      </div>
      <div class="chart__container">
        <canvas class="level-chart-canvas"></canvas>
      </div>
    </div>

    <div class="chart type-chart">
      <div class="chart__header">
        <h2 class="chart__header__title">
          <?php echo $langData[LANG]["charts"]["type"]["title"]; ?>
        </h2>
        <p>
          <?php echo $langData[LANG]["charts"]["type"]["description"]; ?>
        </p>
      </div>
      <div class="chart__container">
        <canvas class="type-chart-canvas"></canvas>
      </div>
    </div>

    <div class="chart country-chart">
      <div class="chart__header">
        <h2  class="chart__header__title">
          <?php echo $langData[LANG]["charts"]["country"]["title"]; ?>
        </h2>
        <p>
          <?php echo $langData[LANG]["charts"]["country"]["description"]; ?>
        </p>
      </div>
      <div class="chart__container">
        <canvas class="country-chart-canvas"></canvas>
      </div>
    </div>

  </main>

  <!-- Footer -->
  <?php require_once(ROOT . "/views/footer_component.php"); ?>

</body>
</html>
