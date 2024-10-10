<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    session_start();

    include 'Guide/tic-tac-toe-functions.php';

    for ($y = 1; $y <= 3; $y++) {
        for ($x = 1; $x <= 3; $x++) {
            $position = $y . '_' . $x;
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
            for ($y = 1; $y <= 3; $y++ ) {
                print "<tr>";
                for ($x = 1; $x <= 3; $x++) {
                    $position = $y . '_' . $x;
                    $location = $_SESSION["game"][$position];
                    print "<td>";
                    if (!empty($location) || !empty($check)) {
                        print "<input type='submit' name='$position' value='$location' "; 
                        if (!empty($check)) {
                            print "style = 'background-color: white;'";
                        }
                        print " disabled />";
                    } else {
                        print "<input type='submit' name='$position' value='$location'/>";
                    }
                    print "</td>";
                }
                print "</tr>";
            }
        print "</table>";
    print "</form>";
    ?>
    </body>
</html>