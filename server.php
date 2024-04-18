<?php 
//? Prendo il file json esterno e lo porto in una stringa
$json_string = file_get_contents('data/dischi.json');

//? Ricodifico la stringa in PHP
$disk = json_decode($json_string, true);
// var_dump($disk);

// Add disk
if(isset($_POST['newTitle'])){
  $new_item = [
    'title' => $_POST['newTitle'],
    'author' => $_POST['newAuthor'],
    'year' => $_POST['newYear'],
    'poster' => $_POST['newPoster'],
    'genre' => $_POST['newGenre'],
  ];
  $disk[] = $new_item;
  file_put_contents('data/dischi.json', json_encode($disk));
}

header('Content-Type: application/json');

echo json_encode($disk);
?>