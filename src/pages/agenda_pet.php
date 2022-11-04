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
            <div class="col-9 h-100 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Agenda</h1>
                <div class="col mx-3 mt-4">
                    <div class="row text-center">
                        <img class="img-fluid" src="../img/calendar.jpg" alt="" width="60%" height="60%">
                    </div>
                    <div class="row mb-4 mt-3 text-end">
                            <div class="col"></div>
                            <div class="col-4">
                                <button type="submit" onclick="window.location='agendamento_consulta.php'" class="btn btn-primary" style="width: 100%">Agendar consulta</button>
                            </div>
                        </div>
                        <div class="row text-start">
                            <h3 class="h3">Histórico de consultas</h3>
                        </div>
                        <table class="table mt-3">
                                <thead>
                                  <tr>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                              </table>
            </div>
        </div>
    </div>
</body>

</html>