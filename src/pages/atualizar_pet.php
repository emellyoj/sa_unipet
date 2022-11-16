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
            include('../../backend/select_informacoes_pet.php');
            $informacoes_pet=runInformacoesPet($_GET['pet']);
            ?>

            <!-- Coluna da direita -->
            <div class="col-lg-9 col-md-12 h-100">
                <div class="container mt-2 text-center col">
                    <form action="/sa_unipet/backend/update_pet.php?id_pet=<?php echo $_GET['pet']?>" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="bg-secondary" style="width: 100%; height: 20em"></div>
                            </div>
                            <div class="col text-start">
                                <label for="">Donos(as)</label>
                                <table class="table" style="user-select: none">
                                    <tbody>
                                        <tr>
                                            <td><img class="rounded-circle" src="../img/imagem.jpg" alt="" width="20px"
                                                    height="20px"></td>
                                            <td>Otto</td>
                                            <td>X</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle" src="../img/imagem.jpg" alt="" width="20px"
                                                    height="20px"></td>
                                            <td>Thornton</td>
                                            <td>X</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle" src="../img/imagem.jpg" alt="" width="20px"
                                                    height="20px"></td>
                                            <td>Larry the Bird</td>
                                            <td>X</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row p-0 text-end">
                                    <div class="col"></div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-primary">
                                            Adicionar dono
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="container row mt-4 text-start">
                            <label for="nomepet" class="form-label p-0">Nome do pet</label>
                            <input type="text" class="form-control" id="nomepet" name="nomepet" value="<?php echo $informacoes_pet["NOME_PET"] ?>">

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
                            <div class="col-3 m-4 me-0">
                                <button type="button" onclick="ConfirmDelete()" class="btn btn-danger" style="width: 100%">Deletar</button>
                            </div>
                            <div class="col-3 m-4 ms-1">
                                <input type="submit" class="btn btn-primary" style="width: 100%" value="Atualizar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
function ConfirmDelete() {
    if(confirm("Tem certeza de que deseja deletar o pet <?php echo $informacoes_pet["NOME_PET"]; ?> ?")){
        window.location.href="../../backend/delete_pet.php?pet=<?php echo $_GET['pet']; ?>"
    }
}
</script>

</html>