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
                try {
                    $dbc = mysqli_connect('localhost', 'csc350', 'xampp', 'grades');
                    $query_all = 'SELECT s.id, s.firstName, s.middleName, s.lastName, h.hw1, h.hw2, h.hw3, h.hw4, h.hw5, q.q1, q.q2, q.q3, q.q4, q.q5, a.midterm, a.finalProject FROM student_info s LEFT JOIN homeworks h ON s.id = h.homeworkId LEFT JOIN quizzes q ON s.id= q.quizId LEFT JOIN assessments a ON s.id=a.assessmentID';
                    if ($r = mysqli_query($dbc, $query_all)) {
                        while ($row = mysqli_fetch_array($r)){
                            $hw_total = ($row['hw1'] + $row['hw2'] + $row['hw3'] + $row['hw4'] + $row['hw5'])/5;
                            $hw_percent = $hw_total * 0.2;
                            $min = $row['q1'];
                            $x = 'q';
                            $dropped = 'Quiz 1';
                            for ($i=2; $i<=5;$i++){
                                if ($min > $row[$x.$i]){
                                    $min = $row[$x.$i];
                                    $dropped = "Quiz ".$i;
                                }
                            }
                            $quiz_total = 0;
                            for ($i=1; $i<=5;$i++){
                                if ($row[$x.$i] != $min){
                                    $quiz_total = $quiz_total + $row[$x.$i];
                                }
                            }
                            $quiz_total = $quiz_total / 4;
                            $quiz_percent = $quiz_total * 0.1;
                            $midterm_percent = $row['midterm'] *0.3;
                            $final_project_percent = $row['finalProject'] *0.4;
                            $final_grade = $hw_percent + $quiz_percent + $midterm_percent + $final_project_percent;
                            $rounded_final_grade = round($final_grade);
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