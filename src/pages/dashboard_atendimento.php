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

<body style="overflow: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container" style="overflow-y:scroll; height: 100vh;"> 
                <div class="row bg-secondary bg-opacity-10 m-3 p-5 rounded">
                    <div class="col-4">
                        <h5 class="h5"><strong>Nome do médico:</strong></h5>
                        <h6 class="h6"><?php echo "Fernanda Mattos Lucarelli de Troia" ?></h6>
                        
                        <h5 class="h5"><strong>Nome do pet:</strong></h5>
                        <h6 class="h6"><?php echo "Snoopy Frederico" ?></h6>
                        
                        <h5 class="h5"><strong>Nome do acompanhante:</strong></h5>
                        <h6 class="h6"><?php echo "Lucas Kroeger" ?></h6>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-4 text-end">
                        <h5 class="h5"><strong>Data:</strong></h5>
                        <h6 class="h6"><?php echo "24/11/2022" ?></h6>
                        
                        <h5 class="h5"><strong>Hora:</strong></h5>
                        <h6 class="h6"><?php echo "16:00" ?></h6>
                    </div>
                </div>
                <div class="row m-1"> 
            
                    <div class="col-8" style="height:100%">
                        <textarea placeholder="Escreva aqui seu relatório sobre a consulta..." name="" id="" class="form-control" style="rezise: none; height: 25em; width:100%; max-height: 25em; min-height: 25em;" ></textarea>
                
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-end" style="height:25em">
                    
                                <button type="submit" class="btn btn-outline-secondary mb-2" style="width: 100%">Agendar vacina</button>
                                <button type="submit" class="btn btn-primary" style="width: 100%">Finalizar consulta</button>
                                
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

</body>

</html>