<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow-x: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
             <!-- Coluna da esquerda -->
             <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda'); 
             ?>
            <!-- Coluna da direita -->
            <div class="col-9 h-100 container" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Agenda</h1>
                <div class="row mx-3 mt-4">
                    <div class="col-7">
                        <img class="img-fluid" src="../img/calendar.jpg" alt="" width="100%">
                    </div>
                    <div class="col-5">
                        <label for="tipoconsulta" class="form-label p-0">Tipo de consulta</label>
                        <select class="form-select" id="tipoconsulta">
                            <option selected disabled value="0">--</option>
                            <option value="VET">Veterinária</option>
                            <option value="VAC">Vacina</option>
                        </select>
                        <label for="pet" class="form-label p-0 mt-3">Pets</label>
                        <select class="form-select" id="pet">
                            <option selected disabled value="0">--</option>
                        </select>
                        <div class="row mt-5 gx-1 align-items-center">
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary w-100">
                                    Filtrar
                                </button>
                            </div>
                            <div class="col-2">
                                <button type="submit"
                                    class="btn btn-secondary w-100 d-inline-flex align-items-center justify-content-center">
                                    <span class="material-icons p-0">
                                        highlight_off
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="mt-2">Consultas próximas</h3>
                    <div class="col-4 border border-secondary m-3">

                    </div>
                    <div class="col-3 p-3">
                        <div class="row mt-5 text-start ">
                            <button type="submit" class="btn btn-danger mt-5" style="width: 100%">Emergência</button>
                            <button type="submit" class="btn btn-primary mt-4" style="width: 100%">Agendar
                                Consulta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>