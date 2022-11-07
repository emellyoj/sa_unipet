<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <script src="../js/escolhahora.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow: hidden;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda_med'); 
                include('../../backend/select_informacoes_pet.php');
                $informacoes_pet = runInformacoesPet($_GET['pet']);
                include('../../backend/select_informacoes_usuario.php');
                $informacoes_medico = selectUserByID($_GET['medico']);

                $getDataVacina = $_GET['datavacina'];
                $getVacina = $_GET['vacina'];

                    // Caso a data selecionada seja no passado ou hoje, não deve ser permitido
                    // o agendamento de vacinas 
                    if( date('Y-m-d', strtotime($getDataVacina)) <= date('Y-m-d')) {
                        $getDataVacina = ''; 
                    }
                    else {
                        include('../../backend/select_horarios_por_medico_data.php');
                        $horarios_do_medico = runHorariosPorMedico($_GET['medico'], $getDataVacina);
                    }
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y:scroll; height: 100vh;"> 
                <h1 class="h1 text-center mt-2 font-weight-bold">Agendar vacina</h1>
                <form action="../../backend/insert_agendamento_vacina.php" method="post">
                    <div class="row">
                        <div class="col-12 p-5">
                            <label class="form-label" for="pet">Para qual pet deseja agendar a vacina?</label>
                            <select class="form-select" id="pet" name="pet" required disabled>
                                <option selected value="<?php echo $informacoes_pet['ID_PET']?>"><?php echo $informacoes_pet['NOME_PET']?></option>
                            </select>

                            <label class="form-label mt-4" for="medico">Qual médico aplicará a vacina?</label>
                            <select class="form-select" id="medico" name="medico" required disabled>
                                <option selected value="<?php echo $informacoes_medico['ID_USUARIO']?>"><?php echo $informacoes_medico['NOMECOMPLETO_USUARIO']?></option>
                            </select>

                            <label class="form-label mt-4" for="vacina">Qual vacina será aplicada?</label>
                            <select class="form-select" id="vacina" name="vacina" required> 
                                <option value="" disabled selected>--</option>
                                <?php
                                include("../../backend/select_vacinas.php");
                                if (!empty($todas_vacinas)){
                                    foreach($todas_vacinas as $vacina){
                                        ?>
                                        <option value="<?php echo $vacina['ID_VACINA'];?>" <?php echo ($vacina['ID_VACINA'] == $getVacina) ? 'selected': ''; // Selectiona a option se o id do medico for igual ao da URL?>> 
                                            <?php echo $vacina['NOME_VACINA'];?>
                                        </option>
                                        
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                            <div class="row mt-4">
                                <div class="col-7">
                                    <label class="form-label" for="datavacina">Para qual data deseja agendar a vacina?</label>
                                    <input class="form-control" type="date" name="datavacina" id="datavacina" 
                                        onchange="criarBotoesHorarios('vacina');" 
                                        value="<?php echo date($getDataVacina)?>" required
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
                                                            onclick="changeSelected(this, 'vacina');">
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
                            <input type="text" id="pet" name="pet" style="display:none" required value="<?php echo $_GET['pet']?>"> 
                            <input type="text" id="medico" name="medico" style="display:none" required value="<?php echo $_GET['medico']?>">
                            <input type="text" id="horavacina" name="horavacina" style="display:none" required>


                            <div class="row mt-2 text-end">
                                <div class="col"></div>
                                <div class="col-4 m-4">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">Agendar Vacina</button>
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

</html>