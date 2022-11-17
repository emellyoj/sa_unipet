<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
    
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
<?php include('../../backend/select_eventos_por_medico.php');?>

<body style="overflow: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
             <!-- Coluna da esquerda -->
             <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda_med'); 
             ?>
            <!-- Coluna da direita -->
            <div class="col-9 h-100 container" style="overflow-y: scroll; height: 100vh;">
  <section style="height: 90vh;">
  <h1 class="h1 text-center mt-2 font-weight-bold">Agenda</h1>
  <div class="col mx-3 mt-4" style="height: 90%">
      <div class="row text-center" style="height: 100%">
        <div id='calendar' style="height: 100%"></div>
      </div>
  </section>
  </div>  
  <div class="mt-1 text-end me-4">
      <input class="form-check-input" id="ocultarfinalizados" name="ocultarfinalizados" type="checkbox" onclick="filterCalendar(this.checked)"
      <?php echo (isset($_GET['filter']) and $_GET['filter'] == 1) ? "checked": "" ;?>>
      <label for="ocultarfinalizados"class="form-label ms-1" style="user-select:none">Ocultar atendimentos finalizados</label>
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
        function ocultarConsultasAtendidas ($x) {
          return $x['STATUS'] != 'Atendido';
        }
        function ocultarVacinasAplicadas ($x) {
          return $x['STATUS'] != 'Aplicada';
        }
        if (isset($_GET['filter']) and $_GET['filter']==1) {
          $consultas = array_filter($consultas, 'ocultarConsultasAtendidas');
          $vacinacoes = array_filter($vacinacoes, 'ocultarVacinasAplicadas');
        }
        unset($_GET['filter']);
        $consultasIsFirstItem = true;
        foreach ($consultas as $i => $consulta) {
          if ($consultasIsFirstItem == false) {
            // Adicionando a virgula de separação entre os dados
            // Essa virgula não deve aparecer antes do primeiro objeto
            echo ',';
          }
          else {
            $consultasIsFirstItem = false;
          }

          echo '{';
          echo "title: 'Consulta: ".$consulta['NOME_PET']."',";
          echo "start: '".$consulta['DATA_CONSULTA']."T".$consulta["HORA_CONSULTA"]."',";
          echo "url: 'dashboard_atendimento.php?consulta=".$consulta['ID_CONSULTA']."'";
          echo '}';

          // Verificando se terão itens após esse objeto para colocar a virugla
        }
        
        if (count($vacinacoes) > 0) {
          echo ',';
        }
        $vacinacoesIsFirstItem = true;
        foreach ($vacinacoes as $vacinacao) {
          if ($vacinacoesIsFirstItem == false) {
            // Adicionando a virgula de separação entre os dados
            // Essa virgula não deve aparecer antes do primeiro objeto
            echo ',';
          }
          else {
            $vacinacoesIsFirstItem = false;
          }

          echo '{';
          echo "title: 'Vacina: ".$vacinacao['NOME_PET']."',";
          echo "start: '".$vacinacao['DATA_VACINACAO']."T".$vacinacao["HORA_VACINACAO"]."',";
          echo "url: 'dashboard_vacinacao.php?vacinacao=".$vacinacao['ID_VACINACAO']."'";
          echo '}';
        }
       
    ?>
  ]
});

calendar.render();
});


function filterCalendar(checked) {
  if (checked) {
    window.location = "agenda_medico.php?filter=1"
  }
  else {
    window.location = "agenda_medico.php?filter=0"
  }
}
</script>
</html>