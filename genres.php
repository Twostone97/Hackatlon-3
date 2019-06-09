<?php
$songs = file_get_contents('songs.json');
$songs = json_decode($songs, true);
for ($i=0; $i < count($songs); $i++) { 
    $genres[] = $songs[$i]["genres"];
}
$genres = array_unique($genres);
$genres = array_merge($genres);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genres</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="list">
<div class="songholder">
<?php for ($i=0; $i < count($genres); $i++): ?>
<div class="song">
    <div class="menu">
    <form action="genre.php" method="post">
                <input type="hidden" name="genres" value="<?=$genres[$i]?>">
                <input type="submit" value="<?= $genres[$i] ?>">
            </form>
    </div>
</div>
<?php endfor; ?>
</div>
</div>
</body>
</html>