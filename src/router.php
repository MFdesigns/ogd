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
    array_shift($urlSegments);

    // Get language route
    $lang = $urlSegments[0];

    if (count($urlSegments) >= 1) {
      switch($lang) {
        case "api":
          require_once(ROOT . "/api.php");
          die();
        break;

        case "":
        case "de":
          define("LANG", "de");
        break;

        case "fr":
          define("LANG", "fr");
        break;

        case "en":
          define("LANG", "en");
        break;

        case "it":
          define("LANG", "it");
        break;

        default:
          http_response_code(404);
          die();
        break;
      }

      if (isset($urlSegments[1])) {
        switch ($urlSegments[1]) {
        case "yearly-report":
          define("CURRENT_PAGE", "yearly-report");
          define("LANG_FILE", "yearly_reports.lang.json");
          require_once(ROOT . "/views/yearly_report.php");
        break;

        case "year-overview":
          define("CURRENT_PAGE", "year-overview");
          define("LANG_FILE", "year_overview.lang.json");
          require_once(ROOT . "/views/year_overview.php");
        break;

        default:
        http_response_code(404);
        die();
        break;
      }
    } else {
        define("CURRENT_PAGE", "");
        require_once(ROOT . "/views/home.php");
      }
    } else {
      http_response_code(404);
      die();
    }
  }
}

?>
