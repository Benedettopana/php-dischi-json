<?php 
//? Prendo il file json esterno e lo porto in una stringa
$json_string = file_get_contents('data/dischi.json');

//? Ricodifico la stringa in PHP
$disk = json_decode($json_string);
// var_dump($disk);

header('Content-Type: application/json');

echo json_encode($disk);
?>