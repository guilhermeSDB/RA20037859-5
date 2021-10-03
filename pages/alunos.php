<?php

$acao = 'recuperar';
require "../controller/alunos_controller.php";

//echo '<pre>';
//print_r($students);
//echo '</pre>';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel ADM | Alunos</title>

  <?php include("imports.php"); ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include("menu-navbar.php"); ?>

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
                  <button type="submit" id="novoAluno" class="btn btn-flat btn-info" data-toggle="modal" data-target="#exampleModal">Novo Aluno</button>
                </div>

                <!--<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
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

                    <?php foreach ($students as $indice => $student) {

                      if (!$student == null) {

                    ?>

                        <tbody>
                          <tr>
                            <td><?= $student->id ?></td>
                            <td><?= $student->name ?></td>
                            <td><?= $student->email ?></td>
                            <td><?= $student->phone ?></td>
                            <td><?= $student->nameCourse ?></td>
                            <td>
                              <?php if ($student->status == '1') {
                                echo "Ativo";
                              } else {
                                echo "Inativo";
                              } ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalVisualizar<?= $student->id ?>">Visualizar</button>
                              <button type="button" class="btn btn-warning" onclick="editar(<?= $student->id ?>, '<?= $student->name ?>','<?= $student->email ?>','<?= $student->password ?>','<?= $student->phone ?>','<?= $student->nameCourse ?>',<?= $student->status ?>)">Editar</button>
                              <button type="button" class="btn btn-danger" onclick="remover(<?= $student->id ?>)">Excluir</button>
                            </td>
                          </tr>
                        </tbody>

                        <!------------------------ Modal Visualizar Alunos ---------------------------->
                        <div class="modal fade" id="modalVisualizar<?= $student->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <p><?= $student->id; ?></p>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <label>Nome</label>
                                    <p><?= $student->name; ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <p><?= $student->email ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="senha">Senha</label>
                                    <p><?= $student->password ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="telefone">Telefone</label>
                                    <p class="phone-number"><?= $student->phone ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Curso</label>
                                    <p><?= $student->nameCourse ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Status:</label>
                                    <p><?= $student->status ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Criado em:</label>
                                    <p><?= $student->created_at ?></p>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Atualizado em:</label>
                                    <p><?= $student->updated_at ?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php } else {
                        #exampleModal
                      }
                    } ?>

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
    <!-- Modal Adicionar/Editar Alunos-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form class="needs-validation" id="formId" action="controller/alunos_controller.php?acao=inserir" method="POST" novalidate>
            <div class="modal-header bg-info" id="modal-color">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar Aluno</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input name="id" type="hidden" class="form-control" id="id" placeholder="Digite o nome do Aluno" required>
              </div>
              <div class="form-group">
                <label for="nome" class="form-label">*Nome (Min 6 caracteres)</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite o nome do Aluno" minlength="6" required>
                <div class="invalid-feedback">
                  Digite o nome do aluno!
                </div>
              </div>
              <div class="form-group">
                <label for="email">*Email</label>
                <input name="email" type="text" class="form-control" id="email" placeholder="Ex: email@example.com" required>
                <div class="invalid-feedback">
                  Email no formato errado!
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="senha">*Senha (Max 10 caracteres) </label>
                  <input name="senha" type="password" class="form-control" id="senha" placeholder="Digite a senha do Aluno" maxlength="10" required>
                  <div class="invalid-feedback" id="messagePassword">
                    Voce não digitou a senha!

                  </div>
                  <span id='message'></span>
                </div>
                <div class="form-group col-md-6">
                  <label for="senha">*Confirmar Senha (Max 10 caracteres)</label>
                  <input type="password" class="form-control" id="confirmSenha" placeholder="Confirme a senha do Aluno" maxlength="10" required>
                  <div class="invalid-feedback" id="messagePassword">
                    Voce não Confirmou a senha!

                  </div>
                  <span id='message'></span>
                </div>
                <div class="form-group col-md-12">
                  <label for="telefone">*Telefone</label>
                  <input name="telefone" type="text" class="form-control phone-number" id="telefone" placeholder="Ex: (19) 99999-9999" maxlength="16" required>
                  <div class="invalid-feedback">
                    Digite o Telefone!
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="validationTooltip04" class="form-label">*Selecione o Curso</label>
                <select name="curso" class="form-control" id="validationTooltip04" required>
                  <option selected disabled value="">Escolha um curso...</option>

                  <?php foreach ($cursos as $indice => $curso) { ?>

                    <option value="<?= $curso->id ?>"><?= $curso->nameCourse ?></option>

                  <?php } ?>

                </select>
                <div class="invalid-feedback">
                  Escolha uma opção!
                </div>
              </div>
              <div class="form-group">
                <label for="validationTooltip05" class="form-label">*Selecione o Status</label>
                <select name="status" class="form-control" id="validationTooltip05" required>
                  <option selected disabled value="">Escolha o status...</option>
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
                </select>
                <div class="invalid-feedback">
                  Escolha uma opção!
                </div>
              </div>
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

  <?php


  ?>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script defer>
    $('#senha, #confirmSenha').on('keyup', function() {
      if ($('#senha').val() == $('#confirmSenha').val()) {
        $('#message').html('As senhas são iguais').css('color', 'green');
      } else
        $('#message').html('As senhas não conferem!').css('color', 'red');
    });

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

    $(document).ready(function() {
      $('.phone-number').mask('(00) 00000-0000')
    })

    function remover(id) {
      location.href = 'alunos.php?acao=remover&id=' + id;
    }

    function editar(id, name, email, password, phone, status, created_at) {
      $("#exampleModal").modal({
        show: true
      });

      $("#button-action").html("Atualizar");
      $("#exampleModalLabel").html("Editar Aluno");
      $("#modal-color").removeClass("bg-info");
      $("#modal-color").addClass("bg-warning");
      $('#formId').attr('action', '../controller/alunos_controller.php?acao=atualizar');
      $('#formId').attr('method', 'POST');
      $("#id").attr('value', +id)
      $("#nome").attr('value', name)
      $("#email").attr('value', email)
      $("#senha").attr('value', password)
      $("#telefone").attr('value', phone)
      $("#status").attr('value', +status)
    }

    $("#novoAluno").click(function() {
      $("#button-action").html("Salvar");
      $("#exampleModalLabel").html("Adicionar Aluno");
      $("#modal-color").removeClass("bg-warning");
      $("#modal-color").addClass("bg-info");
      $('#formId').attr('action', '../controller/alunos_controller.php?acao=inserir');
      $("#nome").val('');
      $("#email").val('');
      $("#senha").val('');
      $("#telefone").val('');
      $("#status").val('');

    })

    <?php if (isset($_GET['inclusao'])) {
      echo "
    Swal.fire({
    icon: 'success',
    title: 'Salvo com sucesso',
    text: 'Foi salvo'
    })";
    } else if (isset($_GET['remover'])) {
      echo "
    Swal.fire({
    icon: 'success',
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
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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