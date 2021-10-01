<?php

$acao = 'recuperar';
require "controller/alunos_controller.php";


/*function trazerCurso(){
  $query = 'SELECT nameCourse FROM courses';
  $conexao = $conexao = new Conexao();
  $conexao = $conexao->conectar();
  $resultado = $conexao->query($query);
  return $conexao;  
  
}

var_dump(trazerCurso());  

*/

//var_dump($studentss); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel ADM | Alunos</title> 

  <?php include("pages/imports.php");?>

<script>
  function editar(id){
    //criar um form de edição
    let form = document.createElement('form')

    //criar um input para entrada do texto
    let inputTarefa = document.createElement('input')

    //criar um button para envio do form
    let inputTarefa = document.createElement('button')
  } 

  function remover(id){
      location.href = 'alunos.php?acao=remover&id='+id;
  }
</script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include("pages/menu-navbar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Alunos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Alunos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <!-- /.content-header -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">                   
          <div class="card">
          <div class="card-header d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-flat btn-info" data-toggle="modal" data-target="#exampleModal">Novo Aluno</button>
          </div> 

          <!--<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
            <div class="bg-success pt-2 text-white d-flex justify-content-center">
              <h5>Aluno inserido com sucesso!</h5>
            </div>
          <?php } ?>
          ------->


              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Curso</th>
                    <th>Status</th>
                    <th>Ação</th>
                  </tr>
                  </thead>

                  <?php foreach($students as $indice => $student) { ?>

                    <tbody>                  
                      <tr>
                        <td><?= $student->id ?></td>
                        <td><?= $student->name ?></td>
                        <td><?= $student->email ?></td>
                        <td><?= $student->phone ?></td>
                        <td><?= $student->nameCourse ?></td>
                        <td>
                          <?php if($student->status == '1'){
                            echo "Ativo";
                          }
                          else{
                            echo "Inativo";
                          }?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-info">Visualizar</button>
                          <button type="button" class="btn btn-warning" onclick="editar(<?= $student->id ?>)">Editar</button>
                          <button type="button" class="btn btn-danger" onclick="remover(<?= $student->id ?>)">Excluir</button>
                        </td>
                      </tr>
                    </tbody>

                  <?php } ?>

                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Curso</th>
                    <th>Status</th>
                    <th>Ação</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->  

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="controller/alunos_controller.php?acao=inserir" method="POST">
        <div class="modal-header">        
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Aluno</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite o nome do Aluno">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control" id="email" placeholder="Digite o email do Aluno">
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="senha">Senha</label>
                  <input name="senha" type="password" class="form-control" id="senha" placeholder="Digite a senha do Aluno">
                </div>
                <div class="form-group col-md-6">
                  <label for="senha">Confirmar Senha</label>
                  <input type="password" class="form-control" id="senha" placeholder="Confirme a senha do Aluno">
                </div>
                <div class="form-group col-md-12">
                <label for="telefone">Telefone</label>
                  <input name="telefone" type="number" class="form-control" id="telefone" placeholder="Ex: (19) 99999-9999">
                </div>
              </div>              
              <div class="form-group">
                <label>Selecione o Curso</label>
                <select name="curso" class="form-control">                 
                
                <?php foreach($studentss as $indice => $student) { ?>   

                    <option value="<?= $student->id ?>"><?= $student->nameCourse ?></option>   

                <?php } ?>

                 </select>
              </div>   
              <div class="form-group">
              <label>Selecione o Status</label>
                <select name="status" class="form-control">
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
                </select>
            </div>     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<script>
  <?php if(isset($_GET['inclusao'])){
    echo "
    Swal.fire({
    icon: 'sucess',
    title: 'Salvo com sucesso',
    text: 'Foi salvo'
    })";
  }else if(isset($_GET['remover'])){
    echo "
    Swal.fire({
    icon: 'sucess',
    title: 'Removido com sucesso',
    text: 'Removido'
    })";
  }

  ?>
</script>


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
