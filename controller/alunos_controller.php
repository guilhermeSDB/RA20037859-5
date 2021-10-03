<?php

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


function requireFunc()
{
    require "../models/conexao.php";
    require "../models/Students.php";
    require "alunos.service.php";
}


if ($acao == 'inserir') {

    requireFunc();

    $alunos = new Students();
    $alunos->__set('name', $_POST['id']);
    $alunos->__set('name', $_POST['nome']);
    $alunos->__set('email', $_POST['email']);
    $alunos->__set('password', $_POST['senha']);
    $alunos->__set('phone', $_POST['telefone']);
    $alunos->__set('course', $_POST['curso']);
    $alunos->__set('status', $_POST['status']);

    $conexao = new Conexao();

    $alunoService = new alunoService($conexao, $alunos);
    $alunoService->inserir();


    header('location: ../pages/alunos.php?inclusao=1');
} else if ($acao == 'recuperar') {

    requireFunc();

    $student = new Students();
    $conexao = new conexao();

    $alunoService = new alunoService($conexao, $student);
    $students = $alunoService->recuperar();
    $cursos = $alunoService->recuperarCourse();
    $rowsNumber = $alunoService->recuperarRowsAlunos();
} else if ($acao == 'atualizar') {

    requireFunc();

    $students = new Students();

    $students->__set('id', $_POST['id']);
    $students->__set('name', $_POST['nome']);
    $students->__set('email', $_POST['email']);
    $students->__set('password', $_POST['senha']);
    $students->__set('phone', $_POST['telefone']);
    $students->__set('course', $_POST['curso']);
    $students->__set('status', $_POST['status']);

    $conexao = new conexao();

    $alunoService = new alunoService($conexao, $students);
    if ($alunoService->atualizar()) {
        header('location: ../pages/alunos.php?recuperar');
    }
} else if ($acao == 'remover') {

    requireFunc();

    $student = new Students();
    $conexao = new conexao();

    $student->__set('id', $_GET['id']);

    $alunoService = new alunoService($conexao, $student);
    $alunoService->remover();

    header('location: ../pages/alunos.php?recuperar');
}
