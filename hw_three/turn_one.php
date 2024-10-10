<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    session_start();

    $_SESSION["turn"] = 1;

    $list = [
        1 => "X",
        2 => "O",
        3 => "X",
        4 => "O",
        5 => "X",
        6 => "O",
        7 => "X",
        8 => "O",
        9 => "X"
    ];

    $_SESSION["moves"] = $list;
    $grid = [];

    for ($y = 1; $y <= 3; $y++) {

        for ($x = 1; $x <= 3; $x++) {
            $position = $y . '_' . $x;
            if (!isset($grid[$position])){
                $grid[$position] = '';
            }
            if(isset($_POST[$position])) {
                $result = $list[$_SESSION["turn"]];
                $grid[$position] = $result;
            }
        }
    }

    $_SESSION["game"] = $grid;
    $_SESSION["turn"]++;

    print "<h1>Tic-Tac-Toe</h1>";
    print "<p>Turn: ". $list[$_SESSION["turn"]] ."</p>";

    print "<form method='post' action='turn_two.php'>";
        print "<table>";

            for ($y = 1; $y <= 3; $y++ ) {
                print "<tr>";
                for ($x = 1; $x <= 3; $x++) {
                    $position = $y . '_' . $x;
                    print "<td>";
                    if ($grid[$position]=='X'){
                        print "<input type='submit' name='$position' value='$grid[$position]' disabled />";
                    } else {
                        print "<input type='submit' name='$position' value='$grid[$position]'/>";
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