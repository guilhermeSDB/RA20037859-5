<?php


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'inserir') {
    require "../conexao.php";
    require "../models/Students.php";
    require "../alunos.service.php";

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


    header('location: ../alunos.php?inclusao=1');
} else if ($acao == 'recuperar') {

    require "conexao.php";
    require "models/Students.php";
    require "alunos.service.php";

    $student = new Students();
    $conexao = new conexao();

    $alunoService = new alunoService($conexao, $student);
    $students = $alunoService->recuperar();
    $cursos = $alunoService->recuperarCourse();
    $rowsNumber = $alunoService->recuperarRowsAlunos();
} else if ($acao == 'atualizar') {

    require "../conexao.php";
    require "../models/Students.php";
    require "../alunos.service.php";

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
        header('location: ../alunos.php?recuperar');
    }
} else if ($acao == 'remover') {

    require "conexao.php";
    require "models/Students.php";
    require "alunos.service.php";

    $student = new Students();
    $conexao = new conexao();

    $student->__set('id', $_GET['id']);

    $alunoService = new alunoService($conexao, $student);
    $alunoService->remover();

    header('location: alunos.php?recuperar');
}
