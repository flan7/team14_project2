<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Highscores</title>
    <link href="./style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <?php
    echo "<h1>Highscores</h1>"; 
    $scores = file("./highscores.txt");
    natsort($scores);
    for ($i = 0; $i < count($scores); $i++){
        $line = explode(",", $scores[$i]);
        $username = trim($line[1]);
        $score = intval(trim($line[0]));
        $var = $i + 1;
        echo "<h3>".$var.". ".$username." $".$score."</h3>";
    }
    ?>
</body>
</html>
