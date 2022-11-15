<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Pet</title>
    <link rel="stylesheet" href="../css/custom.min.css">

</head>

<body style="overflow-x: hidden;width: 100vw;">
    <div style="height: 100%; position: absolute; width: 100%">
           
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php
            include('../../backend/verifiy_logged_user.php'); 
            include('_sidebar.php');
            mainSideBar('meu_perfil'); 
            include('../../backend/select_informacoes_pet.php');
            $informacoes_pet=runInformacoesPet($_GET['pet']);
            ?>

            <!-- Coluna da direita -->
            <div class="col-lg-9 col-md-12 h-100" style="overflow-y: scroll">
                <div class="container mt-2 text-center col">
                    <form action="/sa_unipet/backend/update_pet.php?id_pet=<?php echo $_GET['pet']?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="container row mt-4 text-start">
                            <label for="nomepet" class="form-label p-0">Nome do pet</label>
                            <input type="text" class="form-control" id="nomepet" name="nomepet" value="<?php echo $informacoes_pet["NOME_PET"] ?>">

                        </div>
                        <div class="mt-3 text-start">
                        <label class="form-label" for="imagem">Foto do pet</label>
                        <br>
                        <img src="<?php echo $informacoes_pet["FOTO_PET"] ?>" alt="" class="img-fluid" width=25% id="change">
                        <br>
                        <input type="file" id="imagem" name="imagem" class="form-control mt-2" accept="image/*" value="<?php echo $informacoes_pet["FOTO_PET"] ?>" onchange="changeImage(this);">
                    </div>
                        <div class="container row mt-4 text-start">
                            <label for="generopet" class="form-label p-0">Gênero</label>
                            <select class="form-select" id="generopet" name="generopet">
                                <option selected disabled value="0">--</option>
                                <option value="M" <?php echo ($informacoes_pet["GENERO_PET"]=="M") ? "selected" : "" ?>>Macho</option>
                                <option value="F" <?php echo ($informacoes_pet["GENERO_PET"]=="F") ? "selected" : "" ?> >Fêmea</option>
                            </select>
                        </div>
                        <div class="container row mt-4 text-start">
                            <label for="racapet" class="form-label p-0">Raça</label>
                            <input type="text" class="form-control" id="racapet" name="racapet" value="<?php echo $informacoes_pet["RACA_PET"] ?>">

                        </div>
                        <div class="row mt-5 text-end">
                            <div class="col"></div>
                            <div class="col-4 m-4 me-2">
                                <a href="../../backend/delete_pet.php?id_pet=<?php echo $_GET["pet"] ?>" class="btn btn-danger" style="width: 100%">Remover</a>
                            </div>
                            <div class="col-4 m-4 ms-0">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    function changeImage(input){
        let reader = new FileReader();

        newImage = input.files[0]


        reader.onloadend = function() {
            document.querySelector('#change').src = reader.result 
        }
        reader.readAsDataURL(newImage);
    }



</script>

</html>