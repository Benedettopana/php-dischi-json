<?php 
//? Prendo il file json esterno e lo porto in una stringa
$json_string = file_get_contents('data/dischi.json');

//? Ricodifico la stringa in PHP
$disk = json_decode($json_string, true);
// var_dump($disk);

//% Add disk
if(isset($_POST['newTitle'])){
  $new_item = [
    'title' => $_POST['newTitle'],
    'author' => $_POST['newAuthor'],
    'year' => $_POST['newYear'],
    'poster' => $_POST['newPoster'],
    'genre' => $_POST['newGenre'],
    'favorite' => false
  ];
  $disk[] = $new_item;
  file_put_contents('data/dischi.json', json_encode($disk));
}
//% Add disk

//! Del disk
if(isset($_POST['delDisk'])){
  $diskToDel = $_POST['delDisk'];
  array_splice($disk,$diskToDel, 1);
  file_put_contents('data/dischi.json', json_encode($disk));
}
//! /Del disk

//? Cambio pref
if(isset($_POST['indexPref'])){
  $indexToPref = $_POST['indexPref'];
  $disk[$indexToPref]['favorite'] = !$disk[$indexToPref]['favorite'];
  file_put_contents('data/dischi.json', json_encode($disk));
}
//? /Cambio pref

header('Content-Type: application/json');

echo json_encode($disk);
?>