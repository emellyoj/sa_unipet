<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrinho</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height: 100vh;">
        <div class="row h-100">
            
            <?php
            // include('../../backend/verifiy_logged_user.php'); 
            include('_sidebar.php');
            petshopSideBar('carrinho');
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Carrinho</h1>
                <div class="p-5">


                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card">
                                <img src="../img/imagem.jpg" style="height:150px;" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Nome do produto</h5>
                                    <a href="#" class="btn btn-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../img/imagem.jpg" style="height:150px;" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Nome do produto</h5>
                                    <a href="#" class="btn btn-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../img/imagem.jpg" style="height:150px;" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Nome do produto</h5>
                                    <a href="#" class="btn btn-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="../img/imagem.jpg" style="height:150px;" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Nome do produto</h5>
                                    <a href="#" class="btn btn-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 text-end">
                        <div class="col"></div>
                         <div class="col-2 d-flex align-items-center justify-content-end">
                            <h5 class="h5 m-0 col">Valor total: <span>---</span></h5>  
                        </div>
                        <div class="col-4 p-0">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Finalizar compra</button>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>