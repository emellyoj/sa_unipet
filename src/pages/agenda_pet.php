<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
    <script src="../js/escolhahora.js"></script>
    
    
    <!-- Links para o calendario -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../calendar/fonts/icomoon/style.css">
    <link href='../../calendar/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='../../calendar/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="../../calendar/css/style.css">

       <!-- Bootsrap -->
    <link rel="stylesheet" href="../css/custom.min.css">
</head>
<?php include('../../backend/select_eventos_por_dono.php');?>
<body style="overflow: hidden; width: 100vw;">
    <!-- Modal de consulta -->
    <?php 
      if ($_GET) {
        if(isset($_GET['consulta'])) {
    ?>
    <div class="modal fade" id="modalInformacoesConsulta" tabindex="-1" aria-labelledby="modalInformacoesConsulta" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalInformacoesConsultaLabel">Informações da consulta</h1>
                    <a href="agenda_pet.php">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                  </div>
                  <div class="modal-body">
                    <?php 
                    include('../../backend/select_informacoes_consulta.php');
                    $informacoes_consulta = runInformacoesConsulta($_GET['consulta']);
                    if ($informacoes_consulta) {
                      echo '<div class="d-flex">';
                        echo '<p class="text-dark mb-0"><span class="fw-bold">Data: </span>'.date_format(date_create($informacoes_consulta['DATA_CONSULTA']), 'd/m/Y').'</p>';
                        echo '<p class="text-dark mb-0 ms-4"><span class="fw-bold">Hora: </span>'.$informacoes_consulta['HORA_CONSULTA'].'</p>';
                        echo '<p class="text-dark mb-0 ms-4"><span class="fw-bold">Status: </span>'.$informacoes_consulta['STATUS'].'</p>';
                      echo '</div>';
                      echo '<hr class"hr mt-1">';
                      echo '<p class="text-dark"><span class="fw-bold">Pet: </span>'.$informacoes_consulta['NOME_PET'].'</p>';
                      echo '<p class="text-dark"><span class="fw-bold">Médico(a): </span>'.$informacoes_consulta['MEDICO'].'</p>';                      
                    }
                    else {
                      header ('location:/sa_unipet/src/pages/agenda_pet.php');
                    }
                  ?>
                </div>
                <?php
                if ($informacoes_consulta['STATUS'] == 'Aguardando Atendimento') {
                  ?>
                <div class="modal-footer">
                  <a href="agenda_pet.php?remarcar_consulta=<?php echo $_GET['consulta'] ?>">
                    <button type="button" class="btn btn-secondary">Remarcar</button>
                  </a>                    
                  <a href="../../backend/delete_consulta.php?id_consulta=<?php echo $_GET['consulta'] ?>">
                    <button type="button" class="btn btn-danger">Desmarcar</button>
                  </a>
                  <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php
      }
    }
    ?>
    <!-- Fim Modal de consulta -->

    <!-- Modal de remarcar consulta -->
    <?php 
    if ($_GET) {
      if(isset($_GET['remarcar_consulta'])) {
    ?>
    <div class="modal fade" id="modalRemarcarConsulta" tabindex="-1" aria-labelledby="modalRemarcarConsulta" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalRemarcarConsultaLabel">Remarcar consulta </h1>
                    <a href="agenda_pet.php">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                </div>
                <div class="modal-body">
                  <?php 
                      include('../../backend/select_horarios_por_medico_data.php');
                      include('../../backend/select_informacoes_consulta.php');
                      $informacoes_consulta = runInformacoesConsulta($_GET['remarcar_consulta']);
                      // Caso tenha sido passado uma data na url, essa data será usada, caso contrario sera usada a data atual da consulta
                      $data_consulta = isset($_GET['nova_data']) ? $_GET['nova_data'] : $informacoes_consulta['DATA_CONSULTA'];

                      $horarios_livres_do_medico = runHorariosPorMedico($informacoes_consulta['ID_MEDICO'], $data_consulta);
          
                  ?>
                <form action="../../backend/update_consulta.php?id_consulta=<?php echo $_GET['remarcar_consulta']?>" method="post">

                  <label class="form-label" for="dataconsulta">Para qual data deseja remarcar a consulta?</label>
                  <input class="form-control" type="date" name="dataconsulta" id="dataconsulta" 
                                        onchange="criarSelectHorarios(<?php echo $_GET['remarcar_consulta']; ?>, 'consulta)" 
                                        value="<?php echo date('Y-m-d', strtotime(date($data_consulta)))?>" required
                                        min="<?php echo date('Y-m-d', strtotime(date('Y-m-d').' + 1 day')); // Não deixa selecionar datas no passado?>"
                                        onkeydown="return false">
                                        
                                        
                  <label class="form-label mt-3" for="horarioconsulta">Qual o horário da consulta?</label>                            
                  
                  <select class="form-select" id="horarioconsulta" name="horarioconsulta" required>
                    <option selected disabled value="">--</option>
                    <?php
                    if (!empty($horarios_livres_do_medico)){
                        foreach($horarios_livres_do_medico as $horario){
                            ?>
                            <option value="<?php echo $horario['ID_HORARIO']; ?>">
                                <?php echo $horario['ID_HORARIO'];?>
                            </option>
                            
                            <?php
                        }
                    }
                    ?>
                </select>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Remarcar">
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php 
      }
    }
  ?>
    <!-- Fim Modal de remarcar consulta -->
    
    <!-- Modal de vacinacao -->
        <?php 
      if ($_GET) {
        if(isset($_GET['vacinacao'])) {
    ?>
    <div class="modal fade" id="modalInformacoesVacinacao" tabindex="-1" aria-labelledby="modalInformacoesVacinacao" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalInformacoesVacinacaoLabel">Informações da vacinação</h1>
                    <a href="agenda_pet.php">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                  </div>
                  <div class="modal-body">
                    <?php 
                    include('../../backend/select_informacoes_vacinacao.php');
                    $informacoes_vacinacao = runInformacoesVacinacao($_GET['vacinacao']);
                    if ($informacoes_vacinacao) {
                      echo '<div class="d-flex">';
                        echo '<p class="text-dark mb-0"><span class="fw-bold">Data: </span>'.date_format(date_create($informacoes_vacinacao['DATA_VACINACAO']), 'd/m/Y').'</p>';
                        echo '<p class="text-dark mb-0 ms-4"><span class="fw-bold">Hora: </span>'.$informacoes_vacinacao['HORA_VACINACAO'].'</p>';
                        echo '<p class="text-dark mb-0 ms-4"><span class="fw-bold">Status: </span>'.$informacoes_vacinacao['STATUS'].'</p>';
                      echo '</div>';
                      echo '<hr class"hr mt-1">';
                      echo '<p class="text-dark"><span class="fw-bold">Vacina: </span>'.$informacoes_vacinacao['NOME_VACINA'].'</p>';                      
                      echo '<p class="text-dark"><span class="fw-bold">Pet: </span>'.$informacoes_vacinacao['NOME_PET'].'</p>';
                      echo '<p class="text-dark"><span class="fw-bold">Médico(a): </span>'.$informacoes_vacinacao['MEDICO'].'</p>';                      
                    }
                    else {
                      header ('location:/sa_unipet/src/pages/agenda_pet.php');
                    }
                  ?>
                </div>
                <?php
                if ($informacoes_vacinacao['STATUS'] == 'Aguardando Aplicação') {
                  ?>
                <div class="modal-footer">
                  <a href="agenda_pet.php?remarcar_vacinacao=<?php echo $_GET['vacinacao'] ?>">
                    <button type="button" class="btn btn-secondary">Remarcar</button>
                  </a>                    
                  <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php
      }
    }
    ?>
    <!-- Fim Modal de vacinacao -->

    <!-- Modal de remarcar vacinacao -->
    <?php 
    if ($_GET) {
      if(isset($_GET['remarcar_vacinacao'])) {
    ?>
    <div class="modal fade" id="modalRemarcarVacinacao" tabindex="-1" aria-labelledby="modalRemarcarVacinacao" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalRemarcarVacinacaoLabel">Remarcar vacinacao </h1>
                    <a href="agenda_pet.php">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                </div>
                <div class="modal-body">
                  <?php 
                      include('../../backend/select_horarios_por_medico_data.php');
                      include('../../backend/select_informacoes_vacinacao.php');
                      $informacoes_vacinacao = runInformacoesVacinacao($_GET['remarcar_vacinacao']);
                      // Caso tenha sido passado uma data na url, essa data será usada, caso contrario sera usada a data atual da vacinacao
                      $data_vacinacao = isset($_GET['nova_data']) ? $_GET['nova_data'] : $informacoes_vacinacao['DATA_VACINACAO'];

                      $horarios_livres_do_medico = runHorariosPorMedico($informacoes_vacinacao['ID_MEDICO'], $data_vacinacao);
          
                  ?>
                <form action="../../backend/update_vacinacao.php?id_vacinacao=<?php echo $_GET['remarcar_vacinacao']?>" method="post">

                  <label class="form-label" for="datavacinacao">Para qual data deseja remarcar a vacinação?</label>
                  <input class="form-control" type="date" name="datavacinacao" id="datavacinacao" 
                                        onchange="criarSelectHorarios(<?php echo $_GET['remarcar_vacinacao']; ?>, 'vacinacao')" 
                                        value="<?php echo date('Y-m-d', strtotime(date($data_vacinacao)))?>" required
                                        min="<?php echo date('Y-m-d', strtotime(date('Y-m-d').' + 1 day')); // Não deixa selecionar datas no passado?>"
                                        onkeydown="return false">
                                        
                                        
                  <label class="form-label mt-3" for="horariovacinacao">Qual o horário da vacinação?</label>                            
                  
                  <select class="form-select" id="horariovacinacao" name="horariovacinacao" required>
                    <option selected disabled value="">--</option>
                    <?php
                    if (!empty($horarios_livres_do_medico)){
                        foreach($horarios_livres_do_medico as $horario){
                            ?>
                            <option value="<?php echo $horario['ID_HORARIO']; ?>">
                                <?php echo $horario['ID_HORARIO'];?>
                            </option>
                            
                            <?php
                        }
                    }
                    ?>
                </select>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Remarcar">
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php 
      }
    }
  ?>
    <!-- Fim Modal de remarcar vacinacao -->
    
<div style="position: absolute; width: 100%; height:100%;">
<div class="row h-100">
<!-- Coluna da esquerda -->
<?php 
  include('../../backend/verifiy_logged_user.php');
  include('_sidebar.php');
  mainSideBar('agenda_pet'); 
?>
<!-- Coluna da direita -->
<div class="col-9 h-100 container" style="overflow-y: scroll; height: 100vh;">
  <section style="height: 90vh;">

    <h1 class="h1 text-center mt-2 font-weight-bold">Agenda</h1>
    <div class="col mx-3 mt-4" style="height: 90%">
        <div class="row text-center" style="height: 100%">
          <div id='calendar' style="height: 100%"></div>
            <!-- <img class="img-fluid" src="../img/calendar.jpg" alt="" width="60%" height="60%"> -->
        </div>
        <div class="row mb-4 mt-3 text-end">
            <div class="col"></div>
            <div class="col-4">
              <button type="submit" onclick="window.location='agendamento_consulta.php'" class="btn btn-primary" style="width: 100%">Agendar consulta</button>
            </div>
        </div>
  </section>
        <div class="row text-start" >
          <h3 class="h3">Histórico de consultas</h3>
        </div>
        <table class="table mt-3">
          <thead>
            <tr>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </body>
<script src="../../calendar/js/jquery-3.3.1.min.js"></script>
<script src="../../calendar/js/popper.min.js"></script>
<script src="../../calendar/js/bootstrap.min.js"></script>

<script src='../../calendar/fullcalendar/packages/core/main.js'></script>
<script src='../../calendar/fullcalendar/packages/interaction/main.js'></script>
<script src='../../calendar/fullcalendar/packages/daygrid/main.js'></script>
<script src='../../calendar/fullcalendar/packages/timegrid/main.js'></script>
<script src='../../calendar/fullcalendar/packages/list/main.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
  plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
  height: 'parent',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,listMonth'
  },
  defaultView: 'dayGridMonth',
  defaultDate: '<?php echo date('Y-m-d'); ?>',
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  eventLimit: true, // allow "more" link when too many events
  events: [
    <?php

        foreach ($consultas as $i => $consulta) {
          if ($i > 0) {
            // Adicionando a virgula de separação entre os dados
            // Essa virgula não deve aparecer antes do primeiro objeto
            echo ',';
          }
          echo '{';
          echo "title: 'Consulta: ".$consulta['NOME_PET']."',";
          echo "start: '".$consulta['DATA_CONSULTA']."T".$consulta["HORA_CONSULTA"]."',";
          echo "url: 'agenda_pet.php?consulta=".$consulta['ID_CONSULTA']."'";
          echo '}';
        }
       
        foreach ($vacinacoes as $vacinacao) {
          echo ',{';
          echo "title: 'Vacina: ".$vacinacao['NOME_PET']."',";
          echo "start: '".$vacinacao['DATA_VACINACAO']."T".$vacinacao["HORA_VACINACAO"]."',";
          echo "url: 'agenda_pet.php?vacinacao=".$vacinacao['ID_VACINACAO']."'";
          echo '}';
        }

    ?>
  ]
});

calendar.render();
});

</script>


<script>
  url = new URL(location.href)
  if (url.searchParams.get('consulta')) {
    const modalInformacoesConsulta = new bootstrap.Modal(document.querySelector('#modalInformacoesConsulta'))
    modalInformacoesConsulta.show()
  }
  else if (url.searchParams.get('remarcar_consulta')) {
    const modalRemarcarConsulta = new bootstrap.Modal(document.querySelector('#modalRemarcarConsulta'))
    modalRemarcarConsulta.show()
  }
  else if (url.searchParams.get('vacinacao')) {
    const modalInformacoesVacinacao = new bootstrap.Modal(document.querySelector('#modalInformacoesVacinacao'))
    modalInformacoesVacinacao.show()
  }
  else if (url.searchParams.get('remarcar_vacinacao')) {
    const modalRemarcarVacinacao = new bootstrap.Modal(document.querySelector('#modalRemarcarVacinacao'))
    modalRemarcarVacinacao.show()
  }
</script>

</html>