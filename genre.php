<?php
$songs = file_get_contents('songs.json');
$songs = json_decode($songs, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $_POST["genres"] ?></title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="songholder">
<?php for ($i=0; $i < count($songs); $i++): ?>
<?php if ($_POST["genres"] == $songs[$i]["genres"]): ?>
<div class="song">
    <div class="menu">
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
            <input type="text" name="author" value="<?=$songs[$i]['author']?>">
            <input type="text" name="genres" value="<?=$songs[$i]['genres']?>">
            <input type="submit" value="Edit">  
        </form>
    </div>
</div>
<?php endif; ?>
<?php endfor; ?>
</div>
</body>
</html>