<?php


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'inserir') {


    require_once "../models/conexao.php";
    require_once "../models/courses.php";
    require_once "courses.service.php";

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

    require_once "../models/conexao.php";
    require_once "../models/courses.php";
    require_once "courses.service.php";

    $courses = new Courses();

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

    require_once "../models/conexao.php";
    require_once "../models/courses.php";
    require_once "courses.service.php";

    $course = new Courses();
    $conexao = new conexao();

    $cursoService = new cursoService($conexao, $course);
    $courses = $cursoService->recuperar();
} else if ($acao == 'remover') {

    require_once "../models/conexao.php";
    require_once "../models/courses.php";
    require_once "courses.service.php";

    $courses = new Courses();
    $conexao = new conexao();

    $courses->__set('id', $_GET['id']);

    $cursoService = new cursoService($conexao, $courses);
    $cursoService->remover();

    header('location: ../pages/courses.php');
}
