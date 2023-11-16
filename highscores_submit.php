<?php session_start();
  $newline = "\n".$_SESSION["final_score"].",".$_SESSION["username"];
  file_put_contents('highscores.txt', $newline, FILE_APPEND | LOCK_EX);

  header("location: highscores.php");

?>
