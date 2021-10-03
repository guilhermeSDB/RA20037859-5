<?php


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


function requireFunc()
{
    require "../models/conexao.php";
    require "../models/Courses.php";
    require "courses.service.php";
}

if ($acao == 'inserir') {

    requireFunc();

    $course = new Courses();
    $course->__set('nameCourse', $_POST['nome']);
    $course->__set('description', $_POST['descricao']);
    $course->__set('status', $_POST['status']);
    $course->__set('dateStart', $_POST['dateStart']);
    $course->__set('dateFinish', $_POST['dateFinish']);

    $conexao = new Conexao();

    $cursoService = new cursoService($conexao, $course);
    $cursoService->inserir();

    header('location: ../pages/courses.php?inclusao=1');
} else if ($acao == 'atualizar') {

    requireFunc();

    $courses = new Courses();

    var_dump($_POST);

    $courses->__set('id', $_POST['id']);
    $courses->__set('nameCourse', $_POST['nome']);
    $courses->__set('description', $_POST['descricao']);
    $courses->__set('dateStart', $_POST['dateStart']);
    $courses->__set('dateFinish', $_POST['dateFinish']);
    $courses->__set('status', $_POST['status']);

    $conexao = new conexao();

    $cursoService = new cursoService($conexao, $courses);
    if ($cursoService->atualizar()) {
        header('location: ../pages/courses.php?recuperar');
    }
} else if ($acao == 'recuperar') {

    requireFunc();

    $course = new Courses();
    $conexao = new conexao();

    $cursoService = new cursoService($conexao, $course);
    $courses = $cursoService->recuperar();
} else if ($acao == 'remover') {

    requireFunc();

    $courses = new Courses();
    $conexao = new conexao();

    $courses->__set('id', $_GET['id']);

    $cursoService = new cursoService($conexao, $courses);
    $cursoService->remover();

    header('location: ../pages/courses.php');
}
