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
                include('../../backend/select_informacoes_vacinacao.php');
                if (isset($_GET)){
                    $informacoes_vacinacao = runInformacoesvacinacao($_GET['vacinacao']);
                }else {
                    header('location:/sa_unipet/src/pages/agenda_med.php');
                }

                // Impedir um medico de acessar dashoard de outro médico
                if ($informacoes_vacinacao['ID_MEDICO'] != $_SESSION['pk_usuario']) {
                    header('location:agenda_medico.php'); 
                }
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container" style="overflow-y:scroll; height: 100vh;"> 
                <div class="row bg-secondary bg-opacity-10 m-3 p-5 rounded" style="height: 35vh;">
                    <div class="col-6">
                        <h5 class="h5 mb-0"><strong>Nome do médico:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_vacinacao['MEDICO']; ?></h6>
                        
                        <h5 class="h5 mt-3 mb-0"><strong>Nome do pet:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_vacinacao['NOME_PET']; ?></h6>
                        
                        <h5 class="h5 mt-3 mb-0""><strong>Nome do acompanhante:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_vacinacao['ACOMPANHANTE']; ?></h6>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-4 text-end">
                        <h5 class="h5 mb-0"><strong>Data:</strong></h5>
                        <h6 class="h6"><?php echo date_format(date_create($informacoes_vacinacao['DATA_VACINACAO']), 'd/m/Y'); ?></h6>
                        
                        <h5 class="h5 mt-3 mb-0""><strong>Hora:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_vacinacao['HORA_VACINACAO']; ?></h6>

                        <h5 class="h5 mt-3 mb-0""><strong>Nome da vacina:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_vacinacao['NOME_VACINA'] ?></h6>

                        <h5 class="h5 mt-3 mb-0""><strong>Situação:</strong></h5>
                        <h6 class="h6"><?php echo $informacoes_vacinacao['STATUS'] ?></h6>
                        
                    </div>
                </div>
                <form action="../../backend/update_status_vacinacao.php?vacinacao=<?php echo $_GET['vacinacao']; ?>&novo_status=Atendido" method="POST">
                    <div class="row m-1 mb-0" style="height: 60vh;"> 
                            <div class="col" style="height:100%">
                                <textarea name="descricaovacina" disabled 
                                          class="form-control" style="rezise: none; height: 100%; min-height: 100%; max-height: 100%; width:100%;;"
                                          ><?php if ( $informacoes_vacinacao['DESCRICAO_VACINA'] != NULL) {
                                                echo $informacoes_vacinacao['NOME_VACINA'].":\n\n".$informacoes_vacinacao['DESCRICAO_VACINA'];
                                            }
                                            ?></textarea>
                            </div>
                            <?php 
                            if ($informacoes_vacinacao['STATUS'] != 'Aplicada') {
                                ?>
                                <div class="col-4 d-flex flex-column justify-content-end" style="height:100%">
                                <?php
                                    if ($informacoes_vacinacao['STATUS'] == 'Aguardando aplicação'){
                                        ?>
                                            <a href="../../backend/update_status_vacinacao.php?vacinacao=<?php echo $_GET['vacinacao']?>&novo_status=Aplicada" class="btn btn-primary mb-2" style="width: 100%">Finalizar Aplicação</a>
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

</html>