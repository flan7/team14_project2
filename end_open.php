<!DOCTYPE html>
<html>
<head>
   <title>Opened Final Case!</title>
   <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
   <?php session_start();

   $case = $_SESSION["swapped_case"];
   $case_values = $_SESSION["case_values"];
   $_SESSION["final_score"] = $_SESSION["player_case_value"];
   $_SESSION["username"] = $username;
   echo '<h1>You won $'.$_SESSION["player_case_value"].'!</h1>';
   echo '<h2>other case: $'.$case_values[$case].'</h2>';
   echo '<form method="post" action="highscores_submit.php"><button type="submit">Submit Highscore</button></form>';
   ?>
</body>
</html>
