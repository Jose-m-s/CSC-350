<!DOCTYPE html>
<html>
    <head>
        <title>Tool for Teachers</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Math&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $problem = FALSE;
            if(!empty($_POST['firstName']) && !empty($_POST['middleName']) && !empty($_POST['lastName'])){
                $firstName = trim(strip_tags($_POST['firstName']));
                $middleName = trim(strip_tags($_POST['middleName']));
                $lastName = trim(strip_tags($_POST['lastName']));
            } else {
                print "<p style='color: red;'>Please submit the first, middle, and last name.</p>";
                $problem = TRUE;
            }
            if(is_numeric($_POST['hw1']) && is_numeric($_POST['hw2']) && is_numeric($_POST['hw3']) && is_numeric($_POST['hw4']) && is_numeric($_POST['hw5'])){
                $hw1 = $_POST['hw1'];
                $hw2 = $_POST['hw2'];
                $hw3 = $_POST['hw3'];
                $hw4 = $_POST['hw4'];
                $hw5 = $_POST['hw5'];
            } else {
                print "<p style='color: red;'>Please submit the homework assignments.</p>";
                $problem = TRUE;
            }
            if(is_numeric($_POST['q1']) && is_numeric($_POST['q2']) && is_numeric($_POST['q3']) && is_numeric($_POST['q4']) && is_numeric($_POST['q5'])){
                $q1 = $_POST['q1'];
                $q2 = $_POST['q2'];
                $q3 = $_POST['q3'];
                $q4 = $_POST['q4'];
                $q5 = $_POST['q5'];
            } else {
                print "<p style='color: red;'>Please submit the quizzes.</p>";
                $problem = TRUE;
            }
            if(is_numeric($_POST['midterm']) && is_numeric($_POST['finalProject'])){
                $midterm = $_POST['midterm'];
                $final_project = $_POST['finalProject'];
            } else {
                print "<p style='color: red;'>Please submit the assessments.</p>";
                $problem = TRUE;
            }
            if(!$problem) {
                $dbc = getDatabaseConnection();
                $query_name = "INSERT INTO student_info (firstName, middleName, lastName) VALUES ('$firstName', '$middleName', '$lastName')";
                $query_homeworks = "INSERT INTO homeworks (hw1, hw2, hw3, hw4, hw5) VALUES ('$hw1', '$hw2', '$hw3', '$hw4', '$hw5')";
                $query_quizzes = "INSERT INTO quizzes (q1, q2, q3, q4, q5) VALUES ('$q1', '$q2', '$q3', '$q4', '$q5')";
                $query_assessments = "INSERT INTO assessments (midterm, finalProject) VALUES ('$midterm', '$final_project')";
                if (@mysqli_query($dbc, $query_name)) {
                    print "<p style='color: green;'>$firstName's full name has been added.</p>";
                } else {
                    print "<p style='color: red;'>Could not add the entry because:</br>".mysqli_error($dbc)."</p>";
                    print "<p>The query being run was:".$query_name."</p>";
                }
                if (@mysqli_query($dbc, $query_homeworks)) {
                    print "<p style='color: green;'>$firstName's homeworks has been added.</p>";
                } else {
                    print "<p style='color: red;'>Could not add the entry because:</br>".mysqli_error($dbc)."</p>";
                    print "<p>The query being run was:".$query_homeworks."</p>";
                }
                if (@mysqli_query($dbc, $query_quizzes)) {
                    print "<p style='color: green;'>$firstName's quizzes has been added.</p>";
                } else {
                    print "<p style='color: red;'>Could not add the entry because:</br>".mysqli_error($dbc)."</p>";
                    print "<p>The query being run was:".$query_quizzes."</p>";
                }
                if (@mysqli_query($dbc, $query_assessments)) {
                    print "<p style='color: green;'>$firstName's assessments has been added.</p>";
                } else {
                    print "<p style='color: red;'>Could not add the entry because:</br>".mysqli_error($dbc)."</p>";
                    print "<p>The query being run was:".$query_assessments."</p>";
                }
                mysqli_close($dbc);
            }
        }
        ?>
        <div class='description'>
        <h1>Tool for Student's Grades</h1>
        <p>Please provide the student's first, middle, and last names and then enter their scores for homework assignments, quizzes, midterm and final project assessments. Each score should range between 0 and 110 and may include decimal values.</p>
        </div>
        <form action="add_entry.php" method="post">
            <table>
                <tr>
                    <th colspan="3">Student</th>
                </tr>
                <tr>
                    <td><input type='text' name='firstName'></br>First Name</td>
                    <td><input type='text' name='middleName'></br>Middle Name</td>
                    <td><input type='text' name='lastName'></br>Last Name</td>
                </tr>
            </table></br>
            <table>
                <tr>
                    <th colspan="5">Homeworks</th>
                </tr>
                <tr>
                    <td><input type='number' name='hw1' min='0' max='110' step='0.01'></br>Hw 1</td>
                    <td><input type='number' name='hw2' min='0' max='110' step='0.01'></br>Hw 2</td>
                    <td><input type='number' name='hw3' min='0' max='110' step='0.01'></br>Hw 3</td>
                    <td><input type='number' name='hw4' min='0' max='110' step='0.01'></br>Hw 4</td>
                    <td><input type='number' name='hw5' min='0' max='110' step='0.01'></br>Hw 5</td>
                </tr>
            </table></br>
            <table>
                <tr>
                    <th colspan="5">Quizzes</th>
                </tr>
                <tr>
                    <td><input type='number' name='q1' min='0' max='110' step='0.01'></br>Quiz 1</td>
                    <td><input type='number' name='q2' min='0' max='110' step='0.01'></br>Quiz 2</td>
                    <td><input type='number' name='q3' min='0' max='110' step='0.01'></br>Quiz 3</td>
                    <td><input type='number' name='q4' min='0' max='110' step='0.01'></br>Quiz 4</td>
                    <td><input type='number' name='q5' min='0' max='110' step='0.01'></br>Quiz 5</td>
                </tr>
            </table></br>
            <table>
                <tr>
                    <th colspan="2">Assessments</th>
                </tr>
                <tr>
                    <td><input type='number' name='midterm' min='0' max='110' step='0.01'></br>Midterm</td>
                    <td><input type='number' name='finalProject' min='0' max='110' step='0.01'></br>Final</td>
                </tr>
            </table></br>
            <table>
                <tr>
                    <td><input type='submit' name='submit' value='Submit'></td>
                </tr>
            </table>
        </form>
        </br>
        <table class='links'>
                <tr>
                    <td><a href='index.php'>View Student's Calculated Grade</a></td>
                </tr>
        </table>
    </body>
</html>