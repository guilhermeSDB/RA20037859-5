<?php


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if( $acao == 'inserir'){
    require "../conexao.php";
    require "../models/Courses.php";
    require "../courses.service.php";

    

    $course = new Courses();
    $course->__set('nameCourse', $_POST['nome']);
    $course->__set('description', $_POST['descricao']);
    $course->__set('status', $_POST['status']);
    $course->__set('dateStart', $_POST['dateStart']);
    $course->__set('dateFinish', $_POST['dateFinish']);

    $conexao = new Conexao();

    $cursoService = new cursoService($conexao,$course);
    $cursoService->inserir();

    header('location: ../courses.php?inclusao=1');
}else if($acao == 'recuperar'){
    require "conexao.php";
    require "models/Courses.php";
    require "courses.service.php";

    $course = new Courses();
    $conexao = new conexao();

    $cursoService = new cursoService($conexao,$course);
    $courses = $cursoService->recuperar();

}else if($acao == 'remover'){

    require "conexao.php";
    require "models/Courses.php";
    require "courses.service.php";

    $courses = new Courses();
    $conexao = new conexao();

    $courses->__set('id', $_GET['id']);

    $cursoService = new cursoService($conexao,$courses);
    $cursoService->remover();

    header('location: courses.php');
}


?>