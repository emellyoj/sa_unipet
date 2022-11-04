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

<body style="overflow: hidden;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda'); 
                if ($_GET) {

                    $medico = (int)$_GET['medico'];
                    $dataconsulta = $_GET['dataconsulta'];
                    echo $medico;
                    echo $dataconsulta;
                    include('../../backend/select_horarios_por_medico_data.php');
                    run($medico, $dataconsulta);
                    
                    var_dump($horarios_do_medico);
                }
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y:scroll; height: 100vh;"> 
                <h1 class="h1 text-center mt-2 font-weight-bold">Agendar consulta</h1>
                <div class="row">
                    <div class="col-12 p-5">
                        <label class="form-label" for="pet">Para qual pet deseja agendar a consulta?</label>
                        <select class="form-select" id="pet">
                            <option selected disabled value="0">--</option>
                            <?php
                            include("../../backend/select_pets_por_dono.php");
                            if (!empty($pets)){
                                foreach($pets as $pet){
                                    ?>
                                    <option value="<?php echo $pet['ID_PET'];?>"><?php echo $pet['NOME_PET'];?></option>
                                    
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <label class="form-label mt-4" for="medico">Qual médico realizará o atendimento?</label>
                        <select class="form-select" id="medico" name="medico" onchange="criarBotoesHorarios();"> 
                            <option selected value="0">--</option>
                            <?php
                            include("../../backend/select_medicos.php");
                            if (!empty($todos_medicos)){
                                foreach($todos_medicos as $medico){
                                    ?>
                                    <option value="<?php echo $medico['ID_USUARIO'];?>"><?php echo $medico['NOMECOMPLETO_USUARIO'];?></option>
                                    
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="row mt-4">
                            <div class="col-7">
                                <label class="form-label" for="dataconsulta">Para qual data deseja agendar a
                                    consulta?</label>
                                <input class="form-control" type="date" name="dataconsulta" id="dataconsulta" onchange="criarBotoesHorarios();">
                            </div>
                        </div>

                        <div class="col-8 mt-3">
                            <label class="form-label">Qual o horário da consulta?</label>                            
                            <div class="row row-cols-5 g-3">
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">10:40</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">11:00</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">12:00</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">13:00</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">14:20</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">15:00</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">16:00</button></div>
                                <div class="col"><button type="button" class="btn btn-outline-primary w-100 escolhahora"
                                        onclick="changeSelected(this);">16:20</button></div>
                            </div>
                        </div>
                        <div class="row mt-5 text-end">
                            <div class="col"></div>
                            <div class="col-4 m-4">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Agendar Consulta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>