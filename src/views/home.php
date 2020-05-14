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
  <link rel="stylesheet" href="/css/home_style.css">

  <!-- Scripts -->
  <script src="/js/footer.js" defer></script>

</head>
<body>

  <!-- Header -->
  <?php require_once(ROOT . "/views/header_component.php"); ?>

  <main>
    <div class="landing">
      <h1 class="landing__title">Lernende der Mittelschulen</br> des Kantons Thurgau</h1>
      <p>Diese Website wurde im Rahmen der OGD Projektwoche der Informatikmittelschule erstellt.</p>
    </div>

    <h2 class="view-header">Seitenübersicht</h2>

    <a class="view yearly-reports-view" href="<?php echo "/" . LANG . "/yearly-report"; ?>">
      <img src="/res/yearly_report_icon.svg" alt="">
      <h3 class="view__title">Jahresraport</h3>
      <p>Der Jahresraport zeigt interessante Statistiken zu einem selektierten Jahr an. Der Raport beeinhaltet die Kategorien: Geschlecht, Land, Stufe und Typ der Mittelschüler des Kanton Thurgau.</p>
    </a>

    <a class="view year-overview-view" href="<?php echo "/" . LANG . "/year-overview"; ?>">
      <img src="/res/year_overview_icon.svg" alt="">
      <h3 class="view__title">Jahresübersicht</h3>
      <p>Diese Ansicht bietet eine Übersicht der einzelnen Kategorien (Geschlecht, Land, Stufe und Typ) über die Jahre 2007 bis 2019.</p>
    </a>
  </main>

  <!-- Footer -->
  <?php require_once(ROOT . "/views/footer_component.php"); ?>

</body>
