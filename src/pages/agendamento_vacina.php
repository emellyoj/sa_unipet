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
                mainSideBar('agenda'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y:scroll; height: 100vh;"> 
                <h1 class="h1 text-center mt-2 font-weight-bold">Agendar vacina</h1>
                <div class="row">
                    <div class="col-12 p-5">
                        <label class="form-label" for="pet">Para qual pet deseja agendar a vacina?</label>
                        <input type="text" class="form-control" name="pet" id="pet" value="Snoopy" disabled>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>