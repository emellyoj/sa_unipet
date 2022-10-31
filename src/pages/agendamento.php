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
                <h1 class="h1 text-center mt-2 font-weight-bold">Agendar consulta</h1>
                <div class="row">
                    <div class="col-12 p-5">
                        <label class="form-label" for="pet">Para qual pet deseja agendar a consulta?</label>
                        <select class="form-select" id="pet">
                            <option selected disabled value="0">--</option>
                            <?php
                            include("../../backend/select_pets_por_dono.php");
                            if (!empty($pets)){
                                foreach($pets as $pet){
                                    ?>
                                    <option value="<?php echo $pet['id_pet'];?>"><?php echo $pet['nome_pet'];?></option>
                                    
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <label class="form-label mt-4" for="medico">Qual médico realizará o atendimento?</label>
                        <select class="form-select" id="medico">
                            <option selected value="0">--</option>
                            <?php
                            include("../../backend/select_medicos.php");
                            if (!empty($todos_medicos)){
                                foreach($todos_medicos as $medico){
                                    ?>
                                    <option value="<?php echo $medico['id_usuario'];?>"><?php echo $medico['nomecompleto_usuario'];?></option>
                                    
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="form-text">Caso não selecione nenhum médico, um médico com agenda disponível
                            realizará o
                            atendimento</div>

                        <p class="mb-0 mt-3 font-weight-bold">Recomendados</p>
                        <div class="row g-4 ">
                            <div class="col">
                                <div class="card">
                                    <img src="../img/imagem.jpg" class="card-img-top" alt="..." style="height: 10rem">
                                    <div class="card-body">
                                        <h5 class="card-title">{Nome do médico}</h5>
                                        <div class="card-text row row-cols-5 g-2 w-50">
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        Consultado recentemente
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../img/imagem.jpg" class="card-img-top" alt="..." style="height: 10rem">
                                    <div class="card-body">
                                        <h5 class="card-title">{Nome do médico}</h5>
                                        <div class="card-text row row-cols-5 g-2 w-50">
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        Consultado recentemente
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../img/imagem.jpg" class="card-img-top" alt="..." style="height: 10rem">
                                    <div class="card-body">
                                        <h5 class="card-title">{Nome do médico}</h5>
                                        <div class="card-text row row-cols-5 g-2 w-50">
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        Avaliação alta
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../img/imagem.jpg" class="card-img-top" alt="..." style="height: 10rem">
                                    <div class="card-body">
                                        <h5 class="card-title">{Nome do médico}</h5>
                                        <div class="card-text row row-cols-5 g-2 w-50">
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                            <span class="material-icons text-secondary"> star_border </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        Agenda livre
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-7">
                                <label class="form-label" for="dataconsulta">Para qual pet deseja agendar a
                                    consulta?</label>
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
                            <div class="col-4 m-4">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Agendar Consulta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>