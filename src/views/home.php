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
  <!-- TODO: Add description meta data -->
  <meta name="description" content="">
  <title>Lernende Mittelschulen TG | Home</title>

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/src/res/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/src/res/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/src/res/favicons/favicon-16x16.png">
  <link rel="manifest" href="/src/res/favicons/site.webmanifest">
  <link rel="mask-icon" href="/src/res/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/src/res/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/src/res/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- Styles -->
  <link rel="stylesheet" href="/src/css/general_styles.css">
  <link rel="stylesheet" href="/src/css/home_style.css">

  <!-- Scripts -->
  <script src="/src/js/general.js" defer></script>

</head>
<body>

  <!-- Header -->
  <?php require_once(SRC_ROOT . "/views/header_component.php"); ?>

  <main>
    <div class="landing">
      <h1 class="landing__title"><?php echo $langData["banner"][LANG]["title"]; ?></h1>
      <p><?php echo $langData["banner"][LANG]["description"]; ?></p>
    </div>

    <h2 class="view-header"><?php echo $langData["page"][LANG]["title"]; ?></h2>

    <a class="view yearly-reports-view" href="<?php echo "/" . LANG . "/yearly-report"; ?>">
      <img src="/src/res/yearly_report_icon.svg" alt="">
      <h3 class="view__title"><?php echo $langData["page"][LANG]["report"]["title"]; ?></h3>
      <p><?php echo $langData["page"][LANG]["report"]["description"]; ?></p>
    </a>

    <a class="view year-overview-view" href="<?php echo "/" . LANG . "/year-overview"; ?>">
      <img src="/src/res/year_overview_icon.svg" alt="">
      <h3 class="view__title"><?php echo $langData["page"][LANG]["overview"]["title"]; ?></h3>
      <p><?php echo $langData["page"][LANG]["overview"]["description"]; ?></p>
    </a>
  </main>

  <!-- Footer -->
  <?php require_once(SRC_ROOT . "/views/footer_component.php"); ?>

</body>
