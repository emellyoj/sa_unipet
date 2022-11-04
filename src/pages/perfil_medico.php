<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Pet</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">

</head>

<body style="overflow: hidden;">
    <div style="height: 100%; position: absolute; width: 100%">
           
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php
            include('../../backend/verifiy_logged_user.php'); 
            include('_sidebar.php');
            mainSideBar('meus_pets'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-lg-9 col-md-12 h-100">
                <div class="container mt-2 text-center col">
                    <form action="/sa_unipet/backend/cadastro_pet.php" method="POST">
                        <div class="row d-flex align-items-start">
                            <div class="col-3">
                                <div class="bg-secondary" style="width: 100%; height: 15em"></div>
                            </div>
                            <div class="col text-start">
                            <h5 class="h5">Fernando Mathias Soares</h5>
                            <h5 class="h5">Telefone</h5>
                            <h5 class="h5">Email</h5>
                            <h5 class="h5">Joinville/SC</h5>
                        
                        </div>
                            
                        </div>
                        <div class="container row mt-4 text-start p-0">
                            <h3 class="h3">Avaliações</h3>
                            <div class="alert alert-success ms-2" role="alert">
                            Este médico possui nota 5 (cinco) de acordo com a Agência Nacional de Médicos Veterinários (ANMV)</div>
                            

                        </div>
                        
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>