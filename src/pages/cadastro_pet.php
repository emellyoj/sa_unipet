<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Pet</title>
    <link rel="stylesheet" href="../css/custom.min.css">

</head>

<body style="overflow-x: hidden;">
    <div style="height: 100%; position: absolute; width: 100%">
           
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php
            include('../../backend/verifiy_logged_user.php'); 
            include('_sidebar.php');
            mainSideBar('meu_perfil'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-lg-9 col-md-12 h-100">
                <div class="container mt-2 text-center col">
                    <form action="/sa_unipet/backend/cadastro_pet.php" method="POST" enctype="multipart/form-data"> 
                        <div class="container row mt-4 text-start">
                            <label for="nomepet" class="form-label p-0">Nome do pet</label>
                            <input type="text" class="form-control" id="nomepet" name="nomepet" required>
                        </div>
                    <div class="mt-3 text-start">
                        <label class="form-label" for="imagem">Foto do pet</label>
                        
                        <img src="" alt="" class="img-fluid" width=25%>
                        <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*" >
                    </div>
                        <div class="container row mt-4 text-start">
                            <label for="generopet" class="form-label p-0">Gênero</label>
                            <select class="form-select" id="generopet" name="generopet" required>
                                <option selected disabled value="">--</option>
                                <option value="M">Macho</option>
                                <option value="F">Fêmea</option>
                            </select>
                        </div>
                        <div class="container row mt-4 text-start">
                            <label for="racapet" class="form-label p-0">Raça</label>
                            <input type="text" class="form-control" id="racapet" name="racapet" required>

                        </div>
                        <div class="row mt-5 text-end">
                            <div class="col"></div>
                            <div class="col-4 m-4">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>