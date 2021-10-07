<?php

$acao = 'recuperar';
require "../controller/courses_controller.php";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel ADM | Cursos</title>
  <!-- Tempus Dominus Styles -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <?php include("../pages/imports.php"); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include("../pages/menu-navbar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Cursos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Cursos</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-md-flex justify-content-md-end">
                  <button id="novoCurso" type="button" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modalADD_EDIT">Novo Curso</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Ação</th>
                      </tr>
                    </thead>

                    <?php foreach ($courses as $indice => $course) { ?>
                      <tbody>
                        <tr>
                          <td><?= $course->id ?></td>
                          <td><?= $course->nameCourse ?></td>
                          <td><?= $course->description ?></td>
                          <td><?php if ($course->status == '1') {
                                echo "Ativo";
                              } else {
                                echo "Inativo";
                              } ?></td>
                          <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalVisualizar<?= $course->id ?>">Visualizar</button>
                            <button type="button" class="btn btn-warning editar" onclick="editar(<?= $course->id ?>, '<?= $course->nameCourse ?>','<?= $course->description ?>',<?= $course->status ?>,'<?= $course->dateStart ?>','<?= $course->dateFinish ?>')">Editar</button>
                            <button type="button" class="btn btn-danger" onclick="remover(<?= $course->id ?>)">Excluir</button>
                          </td>
                        </tr>
                      </tbody>

                      <div class="modal fade" id="modalVisualizar<?= $course->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                              <h5 class="modal-title" id="modalVisualizar">Visualizar Aluno</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label>ID</label>
                                <p><?= $course->id; ?></p>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Nome do Curso</label>
                                  <p><?= $course->nameCourse; ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Status:</label>
                                  <p><?= $course->status ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="email">Descrição:</label>
                                  <p><?= $course->description ?></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="telefone">Data de Inicio</label>
                                  <p><?= $course->dateStart ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Data do Fim</label>
                                  <p><?= $course->dateFinish ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Criado em:</label>
                                  <p><?= $course->created_at ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Atualizado em:</label>
                                  <p><?= $course->updated_at ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php } ?>

                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
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

    <!-- Modal Adicionar/Editar-->
    <div class="modal fade" id="modalADD_EDIT" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form class="needs-validation" id="formId" action="../controller/courses_controller.php?acao=inserir" method="POST" novalidate>
            <div class="modal-header bg-info" id="modal-color">
              <h5 class="modal-title" id="ModalLabel">Adicionar Curso</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input name="id" type="hidden" class="form-control" id="id" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="validationTooltip01">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite o nome do curso" required>
                <div class="invalid-feedback">
                  Digite o nome do Curso!
                </div>
              </div>
              <div class="mb-3">
                <label>Selecione o Status</label>
                <select name="status" class="form-control" id="status" required>
                  <option selected disabled value="">Escolha uma opção...</option>
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
                </select>
                <div class="invalid-feedback">
                  Escolha uma opção!
                </div>
              </div>
              <div class="form-group">
                <label for="text-area" class="form-label">Descricao</label>
                <textarea name="descricao" class="form-control" id="description" rows="3" placeholder="Descrição do Curso" required></textarea>
                <div class="invalid-feedback">
                  Digite a descrição do Curso!
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="reservationdate" class="form-label">Data de inicio</label>
                  <div class="input-group date" id="reservationdate">
                    <input name="dateStart" type="date" class="form-control" />

                  </div>
                </div>
                <!----Fim col-md-6----->
                <div class="col-md-6">
                  <label for="reservationdate2" class="form-label">Data do Fim</label>
                  <div class="input-group date" id="reservationdate2">
                    <input name="dateFinish" type="date" class="form-control" />
                  </div>
                </div>
              </div>
              <!----Fim row--->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button id="button-action" type="submit" class="btn btn-success">Salvar</button>
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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()

    function remover(id) {
      location.href = 'courses.php?acao=remover&id=' + id;
    }




    function editar(id, nameCourse, description, status, dateStart, dateFinish) {
      // console.log(id, nameCourse, description, status, dateStart, dateFinish)
      $("#button-action").html("Atualizar");
      $("#ModalLabel").html("Editar Curso");
      $("#modal-color").removeClass("bg-info");
      $("#modal-color").addClass("bg-warning");
      $('#formId').attr('action', '../controller/courses_controller.php?acao=atualizar');
      $('#formId').attr('method', 'POST');
      // $("#status").html(status);
      $("#id").attr('value', +id);
      $("#nome").attr('value', nameCourse);
      $("#description").val(description);
      $("#dateStart").html(dateStart);
      // console.log(datestart);
      $("#dateFinish").attr('value', +dateFinish);
      $("#modalADD_EDIT").modal("show");


    }


    $("#novoCurso").click(function() {
      $("#button-action").html("Salvar");
      $("#exampleModalLabel").html("Adicionar Aluno");
      $("#modal-color").removeClass("bg-warning");
      $("#modal-color").addClass("bg-info");
      $('#formId').attr('action', '../controller/courses_controller.php?acao=inserir');
      $("#nome").val('');
      $("#description").val('');
      $("#status").val('');
      $("#dateStart").val('');
      $("#dateFinish").val('');

    })
  </script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>