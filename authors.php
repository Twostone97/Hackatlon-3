<?php
$songs = file_get_contents('songs.json');
$songs = json_decode($songs, true);
for ($i=0; $i < count($songs); $i++) { 
    $authors[] = $songs[$i]["author"];
}
$authors = array_unique($authors);
$authors = array_merge($authors);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="list">
<div class="songholder">
<?php for ($i=0; $i < count($authors); $i++): ?>
<div class="song">
    <div class="menu">
        <form action="author.php" method="post">
            <input type="hidden" name="author" value="<?=$authors[$i]?>">
            <input type="submit" value="<?=$authors[$i]?>">
        </form>
    </div>
</div>
<?php endfor; ?>
</div>
</div>
</body>
</html>