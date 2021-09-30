<?php 

include 'conn.php';
include 'models/Courses.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$courses = new Courses();
$courses->__set('nameCourse', $_POST['nome']);
$courses->__set('status', $_POST['status']);
$courses->__set('description', $_POST['descricao']);

$nomeCurso = $courses->__get('nameCourse');
$status = $courses->__get('status');
$descricao = $courses->__get('description');

$input = "INSERT INTO courses (nameCourse,description,dateStart,dateFinish,status,created_at,updated_at) values ('$nomeCurso','$descricao','NOW()','NOW()',$status,'NOW()','NOW()')";
$result = $conn->query($input);


