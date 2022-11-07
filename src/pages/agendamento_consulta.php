<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
    <script src="../js/escolhahora.js"></script>

</head>

<body style="overflow: hidden; ">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda_pet'); 
                if ($_GET) {
                    $getPet = $_GET['pet'];
                    $getMedico = $_GET['medico'];
                    $getDataconsulta = $_GET['dataconsulta'];

                    // Caso a data selecionada seja no passado ou hoje, não deve ser permitido
                    // o agendamento de consultas 
                    if( date('Y-m-d', strtotime($getDataconsulta)) <= date('Y-m-d')) {
                        $getDataconsulta = ''; 
                    }
                    else {
                        include('../../backend/select_horarios_por_medico_data.php');
                        $horarios_do_medico = runHorariosPorMedico($getMedico, $getDataconsulta);
                    }
                }
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" id="main-content" style="overflow-y:scroll; height: 100vh;"> 
                <h1 class="h1 text-center mt-2 font-weight-bold">Agendar consulta</h1>
                <form action="../../backend/insert_consulta.php" method="post" id="formAgendamentoConsulta">
                    <div class="row">
                        <div class="col-12 p-5">
                            <label class="form-label" for="pet">Para qual pet deseja agendar a consulta?</label>
                            <select class="form-select" id="pet" name="pet" required>
                                <option selected disabled value="">--</option>
                                <?php
                                include("../../backend/select_pets_por_dono.php");
                                if (!empty($pets)){
                                    foreach($pets as $pet){
                                        ?>
                                        <option value="<?php echo $pet['ID_PET']; ?>" <?php echo ($pet['ID_PET'] == $getPet) ? 'selected': ''; // Selectiona a option se o id do pet for igual ao da URL?>>
                                            <?php echo $pet['NOME_PET'];?>
                                        </option>
                                        
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                            <label class="form-label mt-4" for="medico">Qual médico realizará o atendimento?</label>
                            <select class="form-select" id="medico" name="medico" onchange="criarBotoesHorarios();" required> 
                                <option value="">--</option>
                                <?php
                                include("../../backend/select_medicos.php");
                                if (!empty($todos_medicos)){
                                    foreach($todos_medicos as $medico){
                                        ?>
                                        <option value="<?php echo $medico['ID_USUARIO'];?>" <?php echo ($medico['ID_USUARIO'] == $getMedico) ? 'selected': ''; // Selectiona a option se o id do medico for igual ao da URL?>> 
                                            <?php echo $medico['NOMECOMPLETO_USUARIO'];?>
                                        </option>
                                        
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                            <div class="row mt-4">
                                <div class="col-7">
                                    <label class="form-label" for="dataconsulta">Para qual data deseja agendar a consulta?</label>
                                    <input class="form-control" type="date" name="dataconsulta" id="dataconsulta" 
                                        onchange="criarBotoesHorarios('consulta');" 
                                        value="<?php echo date($getDataconsulta)?>" required
                                        min="<?php echo date('Y-m-d', strtotime(date('Y-m-d').' + 1 day')); // Não deixa selecionar datas no passado?>"
                                        onkeydown="return false">
                                </div>
                            </div>

                            <div class="col-8 mt-3">
                                <label class="form-label">Qual o horário da consulta?</label>                            
                                <div class="row row-cols-5 g-3">
                                    <?php 
                                        foreach ($horarios_do_medico as $horario) {
                                            ?>
                                                <div class="col">
                                                    <button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                                            onclick="changeSelected(this, 'consulta');">
                                                            <?php echo $horario['ID_HORARIO'];?>
                                                    </button>
                                                </div>
                                            <?php
                                        }
                                    ?>

                                </div>
                            </div>

                            <!-- Esse campo de texto fica escondido
                                Sua função é armazenar o horario selecionado nos botoes
                                Dentro de um input para ser acessado na variavel $_POST -->
                            <input type="text" id="horaconsulta" name="horaconsulta" style="display:none" required>

                            <div class="row mt-2 text-end">
                                <div class="col"></div>
                                <div class="col-4 m-4">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">Agendar Consulta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>

</body>
<script>
    // Rolar para baixo
    document.querySelector('#main-content').scrollTo(0, document.querySelector('#main-content').scrollHeight)

    document.querySelector('#formAgendamentoConsulta').addEventListener('submit', e => {
        
        if (document.querySelector('#horaconsulta').value == '') {
            e.preventDefault();
            alert('Favor selecione um horario para a consulta')
        }
        else {
            document.querySelector('#formAgendamentoConsulta').submit();
        }
    })
</script>
</html>