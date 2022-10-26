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
                        <label class="form-label mt-4" for="pet">Qual médico irá realizar a aplicação da vacina?</label>
                        <input type="text" class="form-control" name="pet" id="pet" value="Larissa Mattos" disabled>
                        <label class="form-label mt-4" for="pet">Qual vacina será aplicada?</label>
                        <select class="form-control" name="pet" id="pet">
                            <option value="Vacina de Raiva">Vacina de Raiva</option>
                        </select>

                        <div class="row mt-4">
                            <div class="col-7">
                                <label class="form-label" for="dataconsulta">Selecione uma data para a consulta</label>
                                <input class="form-control" type="date" name="" id="dataconsulta">
                            </div>
                        </div>
                        <div class="col-8 mt-3">
                            <p style="font-size: .8em;" class="mb-0">Horários disponíveis para {Nome do médico}</p>
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
                            <div class="col-4 p-2">
                                <button type="button" class="btn btn-primary" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modalvacina">Agendar vacina</button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalvacina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Vacina</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Alterar informações</button>
                                <button type="button" class="btn btn-primary">Confirmar</button>
                            </div>
                            </div>
                        </div>
                        </div>






                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>