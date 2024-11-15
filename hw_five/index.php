<!DOCTYPE html>
<html>
    <head>
        <title>Check Connection</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Math&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        try {
            // Attempt to connect to MySQL
            $dbc = mysqli_connect('localhost', 'csc350', 'xampp', 'grades');
            // If connection is successful
            print '<p style="color: green;">Successfully connected to the database!</p>';
            print '<p>Proceed to any of the links below:</p>';
            echo <<<TXT
                <table class='links'>
                    <tr>
                        <td class='right_border'><a href='add_entry.php'>Add a Student</a></td>
                        <td><a href='view_entries.php'>View Student's Calculated Grade</a></td>
                    </tr>
                </table>
            TXT;
            mysqli_close($dbc);
        } catch (mysqli_sql_exception $e) {
            // Handle the exception (connection failure)
            print '<p style="color: red;">Unable to connect to the database: '.$e->getMessage().'.</p>';
            print '<p>Please import the <a href="grades.sql">.sql</a> file in phpMyAdmin to set up.</p>';
        }
        ?>
    </body>
</html>