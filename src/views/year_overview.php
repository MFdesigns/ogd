<!--
  Copyright (c) 2020 Michel Fäh, Dario Romandini
  -->

<?php

// Get language file containing all texts from selected language
$langFile = file_get_contents(SRC_ROOT . "/lang/" . LANG_FILE);
$langData = json_decode($langFile, true);

?>

<!DOCTYPE html>
<html lang="<?php echo LANG; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Michel Fäh, Dario Romandini">
  <meta name="description" content="<?php echo $langData[LANG]["page"]["description"]; ?>">
  <title><?php echo LANG_GEN["header"][LANG]["title"] ?> | <?php echo $langData[LANG]["page"]["title"]; ?></title>

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/src/res/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/src/res/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/src/res/favicons/favicon-16x16.png">
  <link rel="manifest" href="/src/res/favicons/site.webmanifest">
  <link rel="mask-icon" href="/src/res/favicons/safari-pinned-tab.svg" color="#16a74e">
  <link rel="shortcut icon" href="/src/res/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/src/res/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- Styles -->
  <link rel="stylesheet" href="/src/css/general_styles.css">
  <link rel="stylesheet" href="/src/css/year_overview_style.css">

  <!-- Scripts -->
  <script src="/src/js/general.js" defer></script>
  <script src="/src/js/yearOverview.js" type="module" defer></script>

</head>
<body>

  <!-- Header -->
  <?php require_once(SRC_ROOT . "/views/header_component.php"); ?>

  <main>

    <!-- Explanation of the site -->
    <div class="banner">
      <div class="banner__header">
        <h1><?php echo $langData[LANG]["page"]["title"]; ?></h1>
        <p><?php echo $langData[LANG]["page"]["description"]; ?></p>
      </div>
    </div>

    <!-- Gender chart -->
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

    <!-- Country chart -->
    <div class="chart country-chart">
      <div class="chart__header">
        <h2 class="chart__header__title">
          <?php echo $langData[LANG]["charts"]["country"]["title"]; ?>

          <!-- Country selection -->
          <select class="select" id="country-select" disabled></select>
        </h2>
        <p>
          <?php echo $langData[LANG]["charts"]["country"]["description"]; ?>
        </p>
      </div>
      <div class="chart__container">
        <canvas class="country-chart-canvas"></canvas>
      </div>
    </div>

    <!-- Type chart -->
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

    <!-- Level chart -->
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

  </main>

  <!-- Footer -->
  <?php require_once(SRC_ROOT . "/views/footer_component.php"); ?>

</body>
</html>
