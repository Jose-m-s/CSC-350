<?php
include_once "../deploy/functions.php";

function test_database_connection () {
    $gdbc = getDatabaseConnection();
    assertTrue($gdbc, "test_database_connection");
}

function test_student_stored_list () {
    $gdbc = getDatabaseConnection();
    $expectedList = [
        '1' => 'Robin Shawn Anstett',
        '2' => 'John Loreum Doe',
        '3' => 'Jason Michael Saunders'
    ];
    $studentList = getStudentList($gdbc);
    assertArrayEqual($studentList, $expectedList, "test_student_stored_list");
}

function test_student_name_lookup_for_existing_student () {
    $gdbc = getDatabaseConnection();
    $studentName = lookUpStudentName($gdbc, '2');
    assertEqual($studentName, "John Loreum Doe", "test_student_name_lookup_for_exisiting_student");
}

function test_student_stored_homeworks () {
    $gdbc = getDatabaseConnection();
    $expected_hw_list = [
        '1' => ['hw1' => 90, 'hw2' => 70, 'hw3' => 90, 'hw4' => 90, 'hw5' => 90],
        '2' => ['hw1' => 75, 'hw2' => 89, 'hw3' => 103, 'hw4' => 55, 'hw5' => 100],
        '3' => ['hw1' => 95, 'hw2' => 92, 'hw3' => 99, 'hw4' => 87, 'hw5' => 90]
    ];
    $hwList = getHwList($gdbc);
    assertEqual($hwList, $expected_hw_list, "test_student_stored_homeworks");
}

function test_student_stored_quizzes () {
    $gdbc = getDatabaseConnection();
    $expected_quiz_list = [
        '1' => ['q1' => 90, 'q2' => 60, 'q3' => 90, 'q4' => 90, 'q5' => 90],
        '2' => ['q1' => 65, 'q2' => 78, 'q3' => 99, 'q4' => 76, 'q5' => 69],
        '3' => ['q1' => 68, 'q2' => 70, 'q3' => 40, 'q4' => 50, 'q5' => 50]
    ];
    $quizList = getQuizList($gdbc);
    assertEqual($quizList, $expected_quiz_list, "test_student_stored_quizzes");
}

function test_student_stored_assessments () {
    $gdbc = getDatabaseConnection();
    $expected_assessment_list = [
        '1' => ['midterm' => 95, 'final_project' => 95],
        '2' => ['midterm' => 84, 'final_project' => 90],
        '3' => ['midterm' => 50, 'final_project' => 84]
    ];
    $assessmentList = getAssessmentList($gdbc);
    assertEqual($assessmentList, $expected_assessment_list, "test_student_stored_assessments");
}