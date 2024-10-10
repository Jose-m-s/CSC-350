<?php

/*
This function checks the session to see if there are any winners of the game.
It checks the 8 possible combinations to see if one of the players has won.
This assumes the session contains a value for each player's selection where the
first number is the column (1-based) and the second is the row (1-based), with a
dash in between. For example:
'1-3' = 'X' means that player X has selected column 1, row 3
'2-2' = 'O' means that player O has selected column 2, row 2
The session would only have values if the player has selected it, if it is not
found in the session it means that no player has selected that spot yet.

The board will look like this:

'1-1'  '2-1'  '3-1'
'1-2'  '2-2'  '3-2'
'1-3'  '2-3'  '3-3'
*/


function whoIsWinner($a, $b, $c, $d, $e, $f, $g, $h, $i) {

    if (isset($a) && isset($d) && isset($g)) {
        $winner = checkWhoHasTheSeries([$a, $d, $g]);
        if ($winner != null) return $winner;
    }
    
    if (isset($b) && isset($e) && isset($h)) {
        $winner = checkWhoHasTheSeries([$b, $e, $h]);
        if ($winner != null) return $winner;
    }

    if (isset($c) && isset($f) && isset($i)) {
        $winner = checkWhoHasTheSeries([$c, $f, $i]);
        if ($winner != null) return $winner;
    }
    
    if (isset($a) && isset($b) && isset($c)) {
        $winner = checkWhoHasTheSeries([$a, $b, $c]);
        if ($winner != null) return $winner;
    }
    
    if (isset($d) && isset($e) && isset($f)) {
        $winner = checkWhoHasTheSeries([$d, $e, $f]);
        if ($winner != null) return $winner;
    }
    
    if (isset($g) && isset($h) && isset($i)) {
        $winner = checkWhoHasTheSeries([$g, $h, $i]);
        if ($winner != null) return $winner;
    }
    
    if (isset($a) && isset($e) && isset($i)) {
        $winner = checkWhoHasTheSeries([$a, $e, $i]);
        if ($winner != null) return $winner;
    }
    
    if (isset($g) && isset($e) && isset($c)) {
        $winner = checkWhoHasTheSeries([$g, $e, $c]);
        if ($winner != null) return $winner;
    }
    
    return null;

}

/*
This function is given a list of values, which can be either 'X' or 'O'.
It returns:
  An 'X' if all 3 items in the list are 'X'
  An 'O' if all 3 items in the list are 'O'
  A null otherwise (i.e. there is no winner for thie combination)
*/

function checkWhoHasTheSeries($list) {

    $XCount = 0;
    $OCount = 0;
    foreach ($list as $value) {
        if ($value == 'X') {
            $XCount++;
        } elseif ($value == 'O') {
            $OCount++;
        }
    }
    if ($XCount == 3)
        return 'X';
    elseif ($OCount == 3)
        return 'O';
    else
        return null;

}

?>