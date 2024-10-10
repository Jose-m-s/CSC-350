<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    
    session_start();

    include 'Guide/tic-tac-toe-functions.php';

    for ($j = 1; $j <= 3; $j++) {
        for ($i = 1; $i <= 3; $i++) {
            $position = $j . '_' . $i;
            if(isset($_POST[$position])) {
                $result = $_SESSION["moves"][$_SESSION["turn"]];
                $_SESSION["game"][$position] = $result;
            }
        }
    }

    $a = $_SESSION["game"]['1_1'];
    $b = $_SESSION["game"]['1_2'];
    $c = $_SESSION["game"]['1_3'];

    $d = $_SESSION["game"]['2_1'];
    $e = $_SESSION["game"]['2_2'];
    $f = $_SESSION["game"]['2_3'];

    $g = $_SESSION["game"]['3_1'];
    $h = $_SESSION["game"]['3_2'];
    $i = $_SESSION["game"]['3_3']; 

    print "<h1>Tic-Tac-Toe</h1>";

    $_SESSION["turn"]++;

    $check = whoIsWinner($a, $b, $c, $d, $e, $f, $g, $h, $i);

    if ($check == null && $_SESSION['turn'] > 9) {
        print "<p>It's a draw.</p>";
    } elseif ($check == "X") {
        print "<p>The winner is X!!</p>";
    } elseif ($check == "O") {
        print "<p>The winner is O!!</p>";
    } else {
        print "<p>Turn: ". $_SESSION["moves"][$_SESSION["turn"]] ."</p>";
    }

    print "<form method='post' action=''>";
        print "<table>";

            for ($j = 1; $j <= 3; $j++ ) {

                print "<tr>";
                
                for ($i = 1; $i <= 3; $i++) {

                    $position = $j . '_' . $i;
                    $location = $_SESSION["game"][$position];

                    if (!empty($location) || !empty($check)) {
                        print "<td> <input type='submit' name='$position' value='$location' "; 
                        if (!empty($check)) {
                            print "style = 'background-color: white;'";
                        }
                        print " disabled /> </td>";
                    } else {
                        print "<td> <input type='submit' name='$position' value='$location'/> </td>";
                    }
                    
                }
                print "</tr>";
            }
        print "</table>";
    print "</form>";

    ?>
    </body>
</html>