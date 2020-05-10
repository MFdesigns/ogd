<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$json = file_get_contents('../data/dataset.json');
	header('Content-Type: application/json; charset=UTF-8');
	echo $json;
} else {
	http_response_code(405);
	die();
}
?>
