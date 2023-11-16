<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Select a Case</title>
    <link href="./style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <?php
        session_start();
        echo "<div class=\"login\">";
        echo "<h1>Greetings ".$_SESSION["username"]."</h1>";

        //initializes all variables and data in the session in order to start
        //the game. Sets initial case values and then shuffles them as is done
        //in the actual game
        function run(){

           //binary array, cases either opened or not opened in their
           //positions
           $opened_cases = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

           //case values array states the value of each case sorted
           $case_values = array(0.01,1,5,10,25,50,100,200,300,400,500,750,1000,2500,5000,7500,10000,15000,25000,50000,75000,100000,250000,500000,750000,1000000);

            
           //the current selected values are set to empty to start
           $_SESSION["selected_values"] = array();

           //sets the prices on the table to be sorted, is randomized next
           //line to make game fair
           $_SESSION["table_values"] = $case_values;

           shuffle($case_values);

           $_SESSION["opened_cases"] = $opened_cases;
           $_SESSION["case_values"] = $case_values;

           //checks if an offer is happening
           $_SESSION["offer"] = 0;

           //prompt user for the case they would like to hold as the player
           echo '<h2> Please select your case! Choose carefully!</h2>';
           echo '<form method="get" action="dnd.php">';
           echo '<input type="number" list="selected_case_opt" id="selected_case" name="selected_case" min="1" max="26">';
           echo '<datalist id="selected_case_opt">';
           echo '<option value="1">';
           echo '<option value="2">';
           echo '<option value="3">';
           echo '<option value="4">';
           echo '<option value="5">';
           echo '<option value="6">';
           echo '<option value="7">';
           echo '<option value="8">';
           echo '<option value="9">';
           echo '<option value="10">';
           echo '<option value="11">';
           echo '<option value="12">';
           echo '<option value="13">';
           echo '<option value="14">';
           echo '<option value="15">';
           echo '<option value="16">';
           echo '<option value="17">';
           echo '<option value="18">';
           echo '<option value="19">';
           echo '<option value="20">';
           echo '<option value="21">';
           echo '<option value="22">';
           echo '<option value="23">';
           echo '<option value="24">';
           echo '<option value="25">';
           echo '<option value="26">';
           echo '</datalist>';
           echo '<button type="submit">Choose</button> </form>';
        }

        run();
    ?>
</body>
</html>
