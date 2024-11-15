<!DOCTYPE html>
<html>
    <head>
        <title>View Student's Grade</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Math&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class='description'>
        <h1>Tool for Student's Grades</h1>
        <p>Here are all the current students in the database, along with their scores for each homework assignment, quiz, midterm exam, and final project. The total scores for each section are also provided, along with the percentage contribution of each section toward the final grade.</p>
        </div>
            <?php
            include "functions.php";
                try {
                    $dbc = getDatabaseConnection();
                    $query_all = 'SELECT s.id, s.firstName, s.middleName, s.lastName, h.hw1, h.hw2, h.hw3, h.hw4, h.hw5, q.q1, q.q2, q.q3, q.q4, q.q5, a.midterm, a.finalProject FROM student_info s LEFT JOIN homeworks h ON s.id = h.homeworkId LEFT JOIN quizzes q ON s.id= q.quizId LEFT JOIN assessments a ON s.id=a.assessmentID';
                    if ($r = mysqli_query($dbc, $query_all)) {
                        while ($row = mysqli_fetch_array($r)) {
                            $homeworks = array($row['hw1'], $row['hw2'], $row['hw3'], $row['hw4'], $row['hw5']);
                            $hw_array = calculateHomeworks($homeworks);
                            $hw_total = $hw_array[0];
                            $hw_percent = $hw_array[1];
                            $quizzes = array($row['q1'], $row['q2'], $row['q3'], $row['q4'], $row['q5']);
                            $quiz_array = calculateQuizzes($quizzes);
                            $dropped = $quiz_array[0];
                            $quiz_total = $quiz_array[1];
                            $quiz_percent = $quiz_array[2];
                            $final_array = calculateFinalGrade ($homeworks, $quizzes,$row['midterm'], $row['finalProject']);
                            $midterm_percent = $final_array[0];
                            $final_project_percent = $final_array[1];
                            $final_grade = $final_array[2];
                            $rounded_final_grade = $final_array[3];
                            echo <<<TXT
                                <table>
                                    <tr>
                                        <th colspan="4">{$row['firstName']} {$row['middleName']} {$row['lastName']}</th>
                                    </tr>
                                    <tr>
                                        <td>Work Type</td>
                                        <td>Score</td>
                                        <td>Total</td>
                                        <td>Percent</td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>Hw 1:</td>
                                        <td>{$row['hw1']}</td>
                                        <td rowspan="5">$hw_total</td>
                                        <td rowspan="5">$hw_percent</td>
                                    </tr>
                                    <tr>
                                        <td>Hw 2:</td>
                                        <td>{$row['hw2']}</td>
                                    </tr>
                                    <tr>
                                        <td>Hw 3:</td>
                                        <td>{$row['hw3']}</td>
                                    </tr>
                                    <tr>
                                        <td>Hw 4:</td>
                                        <td>{$row['hw4']}</td>
                                    </tr>
                                    <tr>
                                        <td>Hw 5:</td>
                                        <td>{$row['hw5']}</td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>Quiz 1:</td>
                                        <td>{$row['q1']}</td>
                                        <td rowspan="5">$quiz_total</td>
                                        <td rowspan="5">$quiz_percent</td>
                                    </tr>
                                    <tr>
                                        <td>Quiz 2:</td>
                                        <td>{$row['q2']}</td>
                                    </tr>
                                    <tr>
                                        <td>Quiz 3:</td>
                                        <td>{$row['q3']}</td>
                                    </tr>
                                    <tr>
                                        <td>Quiz 4:</td>
                                        <td>{$row['q4']}</td>
                                    </tr>
                                    <tr>
                                        <td>Quiz 5:</td>
                                        <td>{$row['q5']}</td>
                                    </tr>
                                    <tr>
                                        <td>Dropped:</td>
                                        <td colspan="3">$dropped</td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">Score</td>
                                        <td>Percent</td>
                                    </tr>
                                    <tr>
                                        <td>Midterm:</td>
                                        <td colspan="2">{$row['midterm']}</td>
                                        <td>$midterm_percent</td>
                                    </tr>
                                    <tr>
                                        <td>Final Project:</td>
                                        <td colspan="2">{$row['finalProject']}</td>
                                        <td>$final_project_percent</td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>Final Grade:</td>
                                        <td colspan="3">$final_grade ≈ $rounded_final_grade</td>
                                    </tr>
                                </table></br>
                            TXT;
                        }
                    }
                    mysqli_close($dbc);
                } catch (mysqli_sql_exception $e) {
                    // Handle the exception (connection failure)
                    print '<p style="color: red;">Unable to connect to the database: '.$e->getMessage().'.</p>';
                }
            ?>
        <table class='links'>
                <tr>
                    <td><a href='add_entry.php'>Add a Student</a></td>
                </tr>
        </table>
    </body>
</html>