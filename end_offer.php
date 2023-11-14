<!DOCTYPE html>
<html>
<head>
   <title>Accepted Offer!</title>
   <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
   <?php session_start();

   $offer_amount = $_SESSION["offer_amount"];
   $_SESSION["final_score"] = $offer_amount;
   $_SESSION["username"] = $username;
   echo '<h1>You won $'.$offer_amount.'</h1>';
   echo '<h2>OG Case: $'.$_SESSION["player_case_value"].'</h2>';
   echo '<form method="post" action="highscores_submit.php"><button type="submit">Submit Highscore</button></form>';
   ?>
</body>
</html>
