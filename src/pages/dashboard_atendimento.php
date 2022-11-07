<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard de atendimento</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <script src="../js/escolhahora.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda_med'); 
                include('../../backend/select_informacoes_consulta.php');
                if (isset($_GET)){
                    $informacoes_consulta = runInformacoesConsulta($_GET['consulta']);
                }else {
                    header('location:/sa_unipet/src/pages/agenda_med.php');
                }

                // Impedir um medico de acessar dashoard de outro médico
                if ($informacoes_consulta['ID_MEDICO'] != $_SESSION['pk_usuario']) {
                    header('location:agenda_medico.php'); 
                }
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container" style="overflow-y:scroll; height: 100vh;"> 
                <div class="row bg-secondary bg-opacity-10 m-3 p-5 rounded" style="height: 30vh;">
                    <div class="col-6">
                        <h5 class="h5 mb-0"><strong>Nome do médico:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_consulta['MEDICO']; ?></h6>
                        
                        <h5 class="h5 mt-3 mb-0"><strong>Nome do pet:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_consulta['NOME_PET']; ?></h6>
                        
                        <h5 class="h5 mt-3 mb-0""><strong>Nome do acompanhante:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_consulta['ACOMPANHANTE']; ?></h6>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-4 text-end">
                        <h5 class="h5 mb-0"><strong>Data:</strong></h5>
                        <h6 class="h6"><?php echo date_format(date_create($informacoes_consulta['DATA_CONSULTA']), 'd/m/Y'); ?></h6>
                        
                        <h5 class="h5 mt-3 mb-0""><strong>Hora:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_consulta['HORA_CONSULTA']; ?></h6>
                        
                    </div>
                </div>
                <form action="../../backend/update_status_consulta.php?consulta=<?php echo $_GET['consulta']; ?>&novo_status=Atendido" method="POST">
                    <div class="row m-1 mb-0" style="height: 65vh;"> 
                            <div class="col" style="height:100%">
                                <textarea placeholder="Escreva aqui seu relatório sobre a consulta..." id="relatorio" name="relatorio" <?php echo ($informacoes_consulta['STATUS'] != 'Em Atendimento') ? "disabled" : "" ?>  
                                          class="form-control" style="rezise: none; height: 100%; min-height: 100%; max-height: 100%; width:100%;;"
                                          ><?php if ( $informacoes_consulta['RELATORIO_CONSULTA'] != NULL) {
                                                echo $informacoes_consulta['RELATORIO_CONSULTA'];
                                            }
                                            ?></textarea>
                            </div>
                            <?php 
                            if ($informacoes_consulta['STATUS'] != 'Atendido') {
                                ?>
                                <div class="col-4 d-flex flex-column justify-content-end" style="height:100%">
                                <?php
                                    if ($informacoes_consulta['STATUS'] == 'Aguardando atendimento'){
                                        ?>
                                            <a href="../../backend/update_status_consulta.php?consulta=<?php echo $_GET['consulta']?>&novo_status=Em_Atendimento" class="btn btn-primary mb-2" style="width: 100%">Iniciar Atendimento</a>
                                        <?php
                                    }
                                    else if ($informacoes_consulta['STATUS'] == 'Em Atendimento'){
                                        ?>
                                        <a class="btn btn-outline-secondary mb-2" href="agendamento_vacina.php?pet=<?php echo $informacoes_consulta['ID_PET']; ?>&medico=<?php echo $informacoes_consulta['ID_MEDICO']?>" style="width: 100%">Agendar vacina</a>
                                        <input type="submit" class="btn btn-primary" style="width: 100%" value="Finalizar atendimento">
                                        <?php
                                    }
                                
                                ?>
                                        
                            </div>
                                <?php
                            }
                            ?>
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>

</body>
<script>
    document.querySelector("#relatorio").addEventListener('change', e => {

        let data = new FormData();
        data.append('relatorio', document.querySelector("#relatorio").value)

        fetch("http://localhost/sa_unipet/backend/update_status_consulta.php?consulta=<?php echo $_GET['consulta']; ?>&novo_status=Em_Atendimento", {
        method: "POST",
        body: data
        });
    })
</script>
</html>