<?php
$songs = file_get_contents('songs.json');
$songs = json_decode($songs, true);

for ($i=0; $i < count($songs); $i++) {
    if ($_POST["hash"] == $songs[$i]["url"][0])
    {
        unset($songs[$i]);
        file_put_contents("songs.json", json_encode(array_values($songs)));
    }
}
header("Location: /index.php");