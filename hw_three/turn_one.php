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

    $grid = [];

    $_SESSION["moves"] = $list;

    for ($j = 1; $j <= 3; $j++) {

        for ($i = 1; $i <= 3; $i++) {

            $position = $j . '_' . $i;

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

            for ($j = 1; $j <= 3; $j++ ) {

                print "<tr>";
                
                for ($i = 1; $i <= 3; $i++) {

                    $position = $j . '_' . $i;

                    if ($grid[$position]=='X'){
                        print "<td> <input type='submit' name='$position' value='$grid[$position]' disabled /> </td>";
                    } else {
                        print "<td> <input type='submit' name='$position' value='$grid[$position]'/> </td>";
                    }
                    
                }

                print "</tr>";
            }
        print "</table>";
    print "</form>";

    ?>
    </body>
</html>