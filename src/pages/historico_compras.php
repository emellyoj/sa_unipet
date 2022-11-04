<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Histórico de compras</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="overflow:hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php
            include('../../backend/verifiy_logged_user.php'); 
            include('_sidebar.php');
            mainSideBar('pedidos'); 
            ?>
            <!-- Coluna da direita -->
            <div class="col-9 container mt-4 p-3" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Histórico de compras</h1>                    
                        <table class="table mt-5">
                                <thead>
                                  <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" width="60px"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td><input type="button" value="Ver pedido" class="btn btn-primary"></td>
                                  </tr>
                                  <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                    <td><input type="button" value="Ver pedido" class="btn btn-primary"></td>

                                  </tr>
                                  <tr>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@twitter</td>
                                    <td>@mdo</td>
                                    <td><input type="button" value="Ver pedido" class="btn btn-primary"></td>

                                  </tr>
                                </tbody>
                              </table>
            </div>
        </div>
    </div>
</body>

</html>