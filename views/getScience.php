<?php

header("Access-Control-Allow-Origin: *");

const DATAFILE = "science.json";
$json_str = file_get_contents(DATAFILE);
header('Content-Type: application/json');

echo $json_str;

?>