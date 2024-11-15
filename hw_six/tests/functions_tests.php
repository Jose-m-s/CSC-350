<?php
include_once "../deploy/functions.php";

function generateScores() {
    $homeworks = [70, 40, 50, 60, 80];
    $quizzes = [50, 40, 30, 20, 60];
    $midterm = 90;
    $final = 90;
    return [$homeworks, $quizzes, $midterm, $final];
}

function test_calculation () {
    [$homeworks, $quizzes, $midterm, $final] = generateScores();
    $result_array = calculateFinalGrade($homeworks, $quizzes, $midterm, $final);
    assertEqual($result_array[2], 79.5,"test_calculation");
}