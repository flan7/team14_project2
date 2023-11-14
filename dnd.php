<!DOCTYPE html>
<html class="plain">
<head>
  <meta charset="UTF-8"/>
  <title>Deal or No Deal</title>
  <link href="./style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
  <?php session_start();

  // check which case is selected
  if (isset($_GET["selected_case"])) {

    $case = $_GET["selected_case"];

    //set session again
    $_SESSION["selected_case"] = $case - 1;
    $_SESSION["round"] = 0;

    //restore data from session
    $opened_cases = $_SESSION["opened_cases"];

    //mark the case selected on the previous screen
    $opened_cases[$case - 1] = 1;

    //add the data including the newly selected case back into the session
    $_SESSION["opened_cases"] = $opened_cases;

    //restore remaining data
    $case_values = $_SESSION["case_values"];
    $player_case = $_SESSION["selected_case"];
    $_SESSION["player_case_value"] = $case_values[$player_case];
  }

  // opened case
  $opened_cases = $_SESSION["opened_cases"];
  if (isset($_GET["new_case"])) {
    $new_case_index = intval($_GET["new_case"]);

    //set case opened
    $opened_cases[$new_case_index - 1] = 1;

    $case_values = $_SESSION["case_values"];
    $value_opened = $case_values[$new_case_index - 1];
    array_push($_SESSION["selected_values"], $value_opened);

    echo '<h2>case value was $'.$value_opened.'</h2>';

    $_SESSION["opened_cases"] = $opened_cases;
  }

  // give offers every 4 rounds
  if ($_SESSION["round"] % 4 == 0 && $_SESSION["round"] != 0) {
    $_SESSION["offer"] = 1;
  } else {
    $_SESSION["offer"] = 0;
  }
  //sets number of rounds, depends on offers made + cases:w
  if ($_SESSION["round"] == 31) {
    $_SESSION["last_round"] = 1;
  } else {
    $_SESSION["last_round"] = 0;
  }


  //increment the round every loop/post
  $_SESSION["round"] = $_SESSION["round"] + 1;

  //creates a scoreboard tracking case values and picked cases, only runs when
  //no offer is being made
  if($_SESSION["offer"] == 0){

    $table_values = $_SESSION["table_values"];

    echo "<table><tr>";

    for($i = 0; $i <= 25; $i++){
      if($i % 6 == 0){
        echo "</tr><tr>";
      }
      //allows the selected cases to be picked out by giving their own class
      if(in_array($table_values[$i], $_SESSION["selected_values"]) && $i != $_SESSION["selected_case"]){
        echo "<td class=\"selected_case\">";
      }else{
        echo "<td>";
      }
      echo $table_values[$i]."</td>";
    }
    echo "</tr></table>";
  }

  //runs the required funciton depending on if it is the end of the game or an
  //offer is available
  if ($_SESSION["offer"] == 1) {

    bank_offer();

  } elseif ($_SESSION["last_round"] == 1) {

    last_round();

  } else {

    next_round();
  }

  function next_round(){
    //gets number of the user's case to display
    $user_case = intval($_SESSION["selected_case"]) + 1;
    echo '<h2>Your case is: '.$user_case.'</h2>';

    //creats form uasing user to submit a new case
    echo '<h2>Select a new case:</h2>';
    echo '<form method="get" action="dnd.php">';
    $opened_cases = $_SESSION["opened_cases"];

    // display available cases
    echo "<table>";
    echo "<tr>";
    for ($i = 0; $i <= 25; $i++) {

      //sets table dimensions
      if($i % 4 == 0){
        echo "</tr>";
        echo "<tr>";
      }

      echo "<td>";

      if ($opened_cases[$i] == 0) {
        $case_num = $i + 1;
        echo '<input type="radio" id="'.$case_num.'" name="new_case" value="'.$case_num.'" required> <label for="'.$case_num.'">'.$case_num.'</label><br>';
      }

      echo "</td>";
    }

    echo "</tr>";
    echo "</table><br/>";

    echo '<button type="submit">Submit</button>';
    echo '</form>';
  }


  //user has not taken offer, last round code
  function last_round(){
    $last_case = 1;
    $cases = $_SESSION["opened_cases"];

    //finds the index of the only case left that has not been selected
    for ($i = 0; $i < 26; $i++) {
      if ($cases[$i] == 0) {
        $last_case = $i;
      }
    }

    $_SESSION["swapped_case"] = $last_case;

    echo '<h2>open or swap?</h2>';
    echo '<form method="get" action="end_swap.php">';
    echo '<button type="submit">Swap</button>'; 
    echo '</form>';
    echo '<form method="get" action="end_open.php">';
    echo '<button type="submit">Open</button>';
    echo '</form>';
  }

  //runs the offer code and generates the offer with get_offer()
  //game can end here
  function bank_offer(){
    echo '<h1>Bank offer!</h1>';
    $offer = get_offer();
    echo '<h2>$'.$offer.'</h2>';
    $_SESSION["offer_amount"] = $offer;
    $_SESSION["offer_active"] = 0;
    echo '<form method="get" action="end_offer.php">
                    <button type="submit">Deal</button>
                    </form><br/>';
                  
    echo '<form method="get" action="dnd.php">';
    echo '<button type="submit">No Deal</button>';
    echo '</form>';
  }

  //logic to calculate the offer from the banker. currently just returns
  //a value as the formula is unknown
  function get_offer(){
      return "400";
  }

  ?>
</body>
</html>
