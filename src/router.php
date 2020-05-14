<?php

/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

class Router {
  private $url;

  function __construct($url) {
    $this->url = $url;
  }

  function route() {
    $urlSegments = explode("/", $this->url);

    if ($this->url == "/") {
      define("PAGE_TITLE", "Hauptseite");
      require_once(ROOT . "/views/home.php");

    } else {
      $currentPage = $urlSegments[1];
      switch ($urlSegments[1]) {
        case "yearly-report":
          define("PAGE_TITLE", "Jahresreport");
          require_once(ROOT . "/views/yearly_report.php");
        break;

        case "year-overview":
          define("PAGE_TITLE", "Jahresübersicht");
          require_once(ROOT . "/views/year_overview.php");
        break;

        case "api":
          require_once(ROOT . "/api.php");
        break;

        default:
          http_response_code(404);
          die();
        break;
      }
    }
  }

}

?>
