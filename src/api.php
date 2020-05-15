<?php

/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

// Check if api request uses correct method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Read dataset and return as json
  $json = file_get_contents(ROOT . '/data/dataset.json');
  header('Content-Type: application/json; charset=UTF-8');
  echo $json;
} else {
  http_response_code(405);
  die();
}

?>
