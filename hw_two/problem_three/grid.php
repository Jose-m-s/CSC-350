<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <title>ASCII Art</title>

        <link rel="stylesheet" href="styles.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Math&display=swap" rel="stylesheet">

    </head>
    
    <body>
        
        <h1>ASCII Art:</h1>
        
        <?php 
        // Store the post content into their own variables
        $size = $_POST['size'];

        $median = intval($size / 2);

        // Print the received data:
        print "<table>";

        for ($j = 0; $j < $size; $j++) {

            print "<tr>";
            
            for ($i = 0; $i < $size; $i++) {

                if(($i == 0 && $j == 0) || ($i == $size-1 && $j == $size-1)){

                    // Top left and Bottom right
                    print "<td style=\"color: blue;\">/</td>";

                } elseif (($i == $size-1 && $j == 0) || ($i == 0 && $j == $size-1)) {

                    // Bottom left and Top right
                    print "<td style=\"color: blue;\">\</td>";

                } elseif ($j == 0) {

                    // Upper line
                    print "<td style=\"color: blue;\">‾</td>";

                }  elseif ( $j == $size-1) {

                    // Lower line
                    print "<td style=\"color: blue;\">_</td>";

                }  elseif ($i == $median && $j == $median) {

                    // Middle
                    print "<td>+</td>";

                } elseif ($i == $median) {

                    // Middle vertical line
                    print "<td>|</td>";

                } elseif ($i == 0 || $i == $size-1) {

                    // Side line
                    print "<td style=\"color: blue;\">|</td>";

                }  elseif ( $j == $median) {

                    // Middle horizontal line
                    print "<td>-</td>";

                } else {
                    
                    // Empty space
                    print "<td> </td>";

                }

            }

            print "</tr>";
        }
        
        print "</table>";
        
        ?>
    </body>
</html>