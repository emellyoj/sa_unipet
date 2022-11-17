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
                <div class="p-5" style="height: 73vh; overflow-y: scroll" >
                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
                        <?php 
                        include('../../backend/select_carrinho.php');
                        if ($itens_carrinho) {
                            foreach ($itens_carrinho as $item) {
                            ?> 
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $item['FOTO_PRODUTO']?>" style="height:250px;" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><span class="text-secondary"><?php echo $item['QUANTIDADE_PRODUTO'] ?>x </span> <?php echo $item['NOME_PRODUTO']?></h5>
                                        <a href="../../backend/remover_do_carrinho.php?id_carrinho=<?php echo $item['ID_CARRINHO']?>" class="btn btn-outline-danger">Remover</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        
                        ?>
                    </div>
                </div>
                <div class="p-5" style="height: 10vh">
                    <div class="row mt-5 text-end">
                        <div class="col"></div>
                         <div class="col-2 d-flex align-items-center justify-content-end">
                            <h5 class="h5 m-0 col">Valor total: R$ <?php echo $total_compra['SUM(SUBTOTAL)'];?></h5>  
                        </div>
                        <div class="col-4 p-0">
                            <a href="../../backend/finalizar_compra.php" class="btn btn-primary" style="width: 100%">Finalizar compra</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>