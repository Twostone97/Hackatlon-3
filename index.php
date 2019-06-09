<?php
$hash = "";
$hashkey = [];

if (isset($songs) == false && empty($songs)){
    $songs = [];
}

if (file_exists('songs.json') == true) {
    $songs = file_get_contents('songs.json');
    $songs = json_decode($songs, true);
}

if ($_POST) {
    $hash = explode("=", $_POST["url"]);
    for ($i=0; $i < count($hash); $i++) {
        if ($hash[$i] == "https://www.youtube.com/watch?v") {
            unset($hash[$i]);
        }
    }
    $hashkey = array_merge($hashkey, $hash);
    $_POST["url"] = $hashkey;
    $songs[] = $_POST;
    $songs = array_filter($songs);
    file_put_contents("songs.json", json_encode($songs));
    $songs = file_get_contents("songs.json");
    $songs = json_decode($songs, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Songs</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div class="addsong">
    <form action="" method="post">
        <label for="author"><a href="authors.php">Author:</a></label>
        <input type="text" name="author" value="">
        <label for="name">Name:</label>
        <input type="text" name="name" value="">
        <label for="url">Url:</label>
        <input type="text" name="url" value="">
        <label for="url"><a href="genres.php">Genre:</a></label>
        <input type="text" name="genres" value="">
        <input type="submit" value="+">
    
    </form>
    </div>
    <div class="songholder">
    <?php for($i=0; $i < count($songs); $i++): ?>
    <div class="song">
    <div class="menu">
        <form action="author.php" method="post">
            <input type="hidden" name="author" value="<?=$songs[$i]['author']?>">
            <input type="submit" value="Author">
        </form>
        <form action="delete.php" method="post">
                <input type="hidden" name="hash" value="<?=$songs[$i]["url"][0]?>">
                <input type="submit" value="Delete">
            </form>
    </div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$songs[$i]["url"][0]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="menu">
            <form action="edit.php" method="post">
                <input type="hidden" name="hash" value="<?=$songs[$i]["url"][0]?>">
                
                <input type="text" name="name" value="<?=$songs[$i]["name"]?>">
                
                <input type="text" name="author" value="<?=$songs[$i]["author"]?>">

                <input type="submit" value="Edit">
            </form>
            <form action="genre.php" method="post">
                <input type="hidden" name="genres" value="<?=$songs[$i]["genres"]?>">
                <input type="submit" value="<?= $songs[$i]["genres"] ?>">
            </form>
        </div>
    </div>
    <?php endfor; ?>
    </div>
</body>
</html>