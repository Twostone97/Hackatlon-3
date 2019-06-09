<?php
$songs = file_get_contents('songs.json');
$songs = json_decode($songs, true);

if ($_POST["name"]) {
    
    for ($i=0; $i < count($songs); $i++) {
        if ($_POST["hash"] == $songs[$i]["url"][0])
        {
            $songs[$i]["name"] = $_POST["name"];
            file_put_contents("songs.json", json_encode($songs));
        }
    }
}

if ($_POST["author"]) {
    
    for ($i=0; $i < count($songs); $i++) {
        if ($_POST["hash"] == $songs[$i]["url"][0])
        {
            $songs[$i]["author"] = $_POST["author"];
            file_put_contents("songs.json", json_encode($songs));
        }
    }
}

if ($_POST["genres"]) {
    
    for ($i=0; $i < count($songs); $i++) {
        if ($_POST["hash"] == $songs[$i]["url"][0])
        {
            $songs[$i]["genres"] = $_POST["genres"];
            file_put_contents("songs.json", json_encode($songs));
        }
    }
}
header("Location: /index.php");