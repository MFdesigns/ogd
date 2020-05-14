<?php
/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/
?>

<header>
  <div class="title">
    <div class="header">
      <img class="header__icon" src="/res/header_icon.svg" alt="">
      <h1 class="header__title"><a href="/">Lernende der Mittelschulen</a></h1>
    </div>
  </div>
  <nav>
    <div class="nav">
      <a class="nav__item <?php if (CURRENT_PAGE == "yearly-report") echo "nav__item--selected"; ?>" href="<?php echo "/" . LANG . "/yearly-report"; ?>">
        <p class="nav__item__text">Jahresreport</p>
      </a>
      <a class="nav__item <?php if (CURRENT_PAGE == "year-overview") echo "nav__item--selected"; ?>" href="<?php echo "/" . LANG . "/year-overview"; ?>">
        <p class="nav__item__text">Jahresübersicht</p>
      </a>
    </div>
  </nav>
</header>
