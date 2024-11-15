<?php

function getDatabaseConnection () {
    return mysqli_connect('localhost', 'csc350', 'xampp', 'grades');
}
function getStudentList ($gdbc) {
    $query = "SELECT * FROM student_info";
    if ($result_set = mysqli_query($gdbc, $query)) {
        while ($row = mysqli_fetch_array($result_set)) {
            $studentList[$row['id']] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
        }
        return $studentList;
    } else {
        return null;
    }
}
function getHwList ($gdbc) {
    $query = "SELECT * FROM homeworks";
    if ($result_set = mysqli_query($gdbc, $query)) {
        while ($row = mysqli_fetch_array($result_set)) {
            $homeworkList[$row['homeworkId']] = ['hw1' => intval($row['hw1']), 'hw2' => intval($row['hw2']), 'hw3' => intval($row['hw3']), 'hw4' => intval($row['hw4']), 'hw5' => intval($row['hw5'])];
        }
        return $homeworkList;
    } else {
        return null;
    }
}
function getQuizList ($gdbc) {
    $query = "SELECT * FROM quizzes";
    if ($result_set = mysqli_query($gdbc, $query)) {
        while ($row = mysqli_fetch_array($result_set)) {
            $quizList[$row['quizId']] = ['q1' => intval($row['q1']), 'q2' => intval($row['q2']), 'q3' => intval($row['q3']), 'q4' => intval($row['q4']), 'q5' => intval($row['q5'])];
        }
        return $quizList;
    } else {
        return null;
    }
}
function getAssessmentList ($gdbc) {
    $query = "SELECT * FROM assessments";
    if ($result_set = mysqli_query($gdbc, $query)) {
        while ($row = mysqli_fetch_array($result_set)) {
            $assessmentList[$row['assessmentId']] = ['midterm' => intval($row['midterm']), 'final_project' => intval($row['finalProject'])];
        }
        return $assessmentList;
    } else {
        return null;
    }
}
function lookUpStudentName ($gdbc, $id) {
    $query = "SELECT firstName, middleName, lastName FROM student_info WHERE id=$id";
    if ($result_set = mysqli_query($gdbc, $query)) {
        while ($row = mysqli_fetch_array($result_set)) {
            $studentName = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
        }
        return $studentName;
    } else {
        return null;
    }
}
function calculateHomeworks ($homeworks) {
    $hw_average = 0;
    if (count($homeworks) > 0) {
        $hw_average = array_sum($homeworks)/count($homeworks);
    }
    return $hw_array = array($hw_average, $hw_average*0.2);
}
function calculateQuizzes ($quizzes) {
    $lowest = $quizzes[0];
    $dropped = "Quiz 1";
    $quiz_average = $lowest;
    if (count($quizzes) > 0) {
        for ($i=1; $i<5; $i++){
            $quiz_average += $quizzes[$i];
            if ($lowest > $quizzes[$i]) {
                $lowest = $quizzes[$i];
                $dropped = "Quiz ".($i+1);
            }
        }
        $quiz_average = ($quiz_average - $lowest) / (count($quizzes)-1);
    }
    return $quiz_array = array($dropped, $quiz_average, $quiz_average*0.1);
}
function calculateFinalGrade ($homeworks, $quizzes, $midterm, $final) {
    $hw_array = calculateHomeworks($homeworks);
    $hw_percent = $hw_array[1];
    $quiz_array = calculateQuizzes($quizzes);
    $quiz_percent = $quiz_array[2];
    $midterm_percent = $midterm * 0.3;
    $final_percent = $final * 0.4;
    $final_grade = $hw_percent + $quiz_percent + $midterm_percent + $final_percent;
    return $final_array = array($midterm_percent, $final_percent, $final_grade, round($final_grade));
}