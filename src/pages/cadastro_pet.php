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
            mainSideBar('meus_pets'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-lg-9 col-md-12 h-100">
                <div class="container mt-2 text-center col">
                    <form action="/sa_unipet/backend/cadastro_pet.php" method="POST">
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
                            <input type="text" class="form-control" id="nomepet" name="nomepet">

                        </div>
                        <div class="container row mt-4 text-start">
                            <label for="generopet" class="form-label p-0">Gênero</label>
                            <select class="form-select" id="generopet" name="generopet">
                                <option selected disabled value="0">--</option>
                                <option value="M">Macho</option>
                                <option value="F">Fêmea</option>
                            </select>
                        </div>
                        <div class="container row mt-4 text-start">
                            <label for="racapet" class="form-label p-0">Raça</label>
                            <input type="text" class="form-control" id="racapet" name="racapet">

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