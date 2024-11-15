CREATE DATABASE IF NOT EXISTS grades;

USE grades;

DROP TABLE IF EXISTS student_info;
DROP TABLE IF EXISTS homeworks;
DROP TABLE IF EXISTS quizzes;
DROP TABLE IF EXISTS assessments;
DROP TABLE IF EXISTS calculations;

CREATE TABLE student_info (
    id INT UNSIGNED AUTO_INCREMENT UNIQUE NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    middleName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE homeworks (
    homeworkId INT UNSIGNED AUTO_INCREMENT UNIQUE NOT NULL,
    hw1 float UNSIGNED,
    hw2 float UNSIGNED,
    hw3 float UNSIGNED,
    hw4 float UNSIGNED,
    hw5 float UNSIGNED,
    PRIMARY KEY (homeworkId)
);

CREATE TABLE quizzes (
    quizId INT UNSIGNED AUTO_INCREMENT UNIQUE NOT NULL,
    q1 float UNSIGNED,
    q2 float UNSIGNED,
    q3 float UNSIGNED,
    q4 float UNSIGNED,
    q5 float UNSIGNED,
    PRIMARY KEY (quizId)
);

CREATE TABLE assessments (
    assessmentId INT UNSIGNED AUTO_INCREMENT UNIQUE NOT NULL,
    midterm float UNSIGNED,
    finalProject float UNSIGNED,
    PRIMARY KEY (assessmentId)
);

INSERT INTO student_info (firstName, middleName, lastName)
VALUES 
('Robin', 'Shawn', 'Anstett'),
('John', 'Loreum', 'Doe'),
('Jason', 'Michael', 'Saunders');

INSERT INTO homeworks (hw1, hw2, hw3, hw4, hw5)
VALUES
(90, 70, 90, 90, 90), 
(75, 89, 103, 55, 100),
(95, 92, 99, 87, 90);

INSERT INTO quizzes (q1, q2, q3, q4, q5)
VALUES
(90, 60, 90, 90, 90),
(65, 78, 99, 76, 69),
(68, 70, 40, 50, 50);

INSERT INTO assessments (midterm, finalProject)
VALUES 
(95, 95),
(84, 90),
(50, 84);