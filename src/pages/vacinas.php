<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vacinas</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="overflow: hidden; width: 100vw;">
    <div style="height: 100vh; position: absolute; width: 100%">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('_sidebar.php');
                mainSideBar('vacinas'); 
            ?>
            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Vacinas</h1>                    
                <div class="col-3">
                    <label class="form-label" for="pet">Selecione um pet</label>
                    <select class="form-select" id="pet" name="pet">
                        <option selected disabled value="0">--</option>
                    </select>
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
                              <div class="card mb-3 mt-3" style="max-width: 440px;">
                                    <div class="row g-0">
                                      <div class="col-md-2">
                                        <img src="../img/imagem.jpg" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title">Próximas vacinas</h5>
                                          <p class="card-text">This content is a little bit longer.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
            </div>
        </div>
    </div>
</body>

</html>