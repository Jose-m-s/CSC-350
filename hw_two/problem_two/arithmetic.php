<!DOCTYPE html>
<html>

    <head>

    <meta charset="utf-8">
    <title>Calculator</title>
    
    <link rel="stylesheet" href="styles.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Math&display=swap" rel="stylesheet">

    </head>

    <body>

    <h1>Simple PEDMAS Calculator</h1>

    <?php

    // Store the post content into their own variables
    $value_one = $_POST['input_one'];
    $value_two = $_POST['input_two'];
    $value_three = $_POST['input_three'];
    
    $operator_one = $_POST['operator_one'];
    $operator_two = $_POST['operator_two'];

    $expression = "$value_one $operator_one $value_two $operator_two $value_three";

    if (($operator_one == "/" && $value_two == 0)||($operator_two == "/" && $value_three == 0)) {

        // When attempting to divide by zero.
        print "<p>$expression = Not possible.</p>";

    } else {

        /*
        Instead of creating multiple else-if loops,
        used the eval() function to shorten the process.
        */

        $result = eval("return $expression;");
        print "<p>$expression = $result </p>";

    }

    ?>

    </body>

</html>