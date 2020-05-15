<?php
/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/
?>

<header>
  <div class="title">
    <div class="header">
      <img class="header__icon" src="/src/res/header_icon.svg" alt="">
      <h1 class="header__title"><a href="<?php echo "/" . LANG; ?>"><?php echo LANG_GEN["header"][LANG]["title"] ?></a></h1>
      <button class="nav-open-button">
        <img class="nav-open-button__icon" src="/src/res/hamburger_icon.svg" alt="">
      </button>
    </div>
  </div>

  <nav class="desktop-nav">
    <div class="nav">
      <a class="nav__item <?php if (CURRENT_PAGE == "yearly-report") echo "nav__item--selected"; ?>" href="<?php echo "/" . LANG . "/yearly-report"; ?>">
        <p class="nav__item__text"><?php echo LANG_GEN["header"][LANG]["navbarReport"] ?></p>
      </a>
      <a class="nav__item <?php if (CURRENT_PAGE == "year-overview") echo "nav__item--selected"; ?>" href="<?php echo "/" . LANG . "/year-overview"; ?>">
        <p class="nav__item__text"><?php echo LANG_GEN["header"][LANG]["navbarOverview"] ?></p>
      </a>
    </div>
  </nav>
</header>

<div class="mobile-nav-container">
  <nav class="mobile-nav">
    <ul class="mobile-nav__list">
      <li>
        <a class="mobile-nav__item" href="<?php echo "/" . LANG . "/yearly-report"; ?>">
          <?php echo LANG_GEN["header"][LANG]["navbarReport"] ?>
        </a>
      </li>
      <li>
        <a class="mobile-nav__item" href="<?php echo "/" . LANG . "/year-overview"; ?>">
          <?php echo LANG_GEN["header"][LANG]["navbarOverview"] ?>
        </a>
      </li>
    </ul>
    <button class="nav-close-button">
      <img class="nav-close-button__icon" src="/src/res/nav_close_icon.svg" alt="">
    </button>
  </nav>
</div>
