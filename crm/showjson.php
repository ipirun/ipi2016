<?php


//var_dump($_POST);

$result =  json_encode($_POST);

$file = "test.json";

file_put_contents($file, $result);
