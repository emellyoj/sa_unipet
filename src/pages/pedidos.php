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
            petshopSideBar('pedidos');
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Pedidos</h1>
                <div class="p-5" >
                <!-- Modal de pedido -->
                <?php 
                if ($_GET) {
                    if(isset($_GET['pedido'])) {
                ?>
                <div class="modal fade" id="modalInformacoesPedido" tabindex="-1" aria-labelledby="modalInformacoesPedido" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalInformacoesPedidoLabel">Informações da compra</h1>
                                <a href="pedidos.php">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </a>
                            </div>
                            <div class="modal-body">
                                <?php 
                                include('../../backend/select_informacoes_compra.php');
                                $informacoes_pedido = runInformacoesPedido($_GET['pedido']);
                                if ($informacoes_pedido) {
                                    foreach ($informacoes_pedido as $produto) {
                                        ?>
                                        <p class="text-dark">
                                            <span class="fw-bold me-1">
                                                <?php echo $produto['QUANTIDADE_PRODUTO']?> x
                                            </span>
                                            <?php echo $produto['NOME_PRODUTO']?>
                                        </p>
                                        <?php
                                    }
                                    ?>
                                        <hr class="hr">
                                        <p class="text-dark">
                                            <span class="fw-bold me-1">
                                                Total: 
                                            </span>
                                            R$ <?php echo $produto['TOTAL_COMPRA'];?> 
                                        </p>
                                        <div class="row w-100">
                                            <div class="col-6">
                                                <span class="text-dark">
                                                    <span class="fw-bold me-1">
                                                        Data:
                                                    </span>
                                                    <?php echo $produto['DATA_COMPRA'];?>
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-dark">
                                                    <span class="fw-bold me-1">
                                                        Hora:
                                                    </span>
                                                    <?php echo $produto['HORA_COMPRA'];?>
                                                </span>

                                            </div>
                                        </div>
                                    <?php
                                }
                                else {
                                header ('location:/sa_unipet/src/pages/pedidos.php');
                                }
                            ?>                            
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>
                <!-- Fim Modal de pedido -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Data compra</th>
                            <th scope="col">Hora compra</th>
                            <th scope="col">Total</th>
                            <th scope="col">Informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include('../../backend/select_pedidos.php');
                            if($pedidos) {
                                foreach ($pedidos as $pedido) {
                                    ?>  
                                    <tr>
                                        <td><?php echo date_format(date_create($pedido['DATA_COMPRA']), 'd/m/Y');?></td>
                                        <td><?php echo $pedido['HORA_COMPRA'];?></td>
                                        <td><?php echo $pedido['TOTAL_COMPRA'];?></td>
                                        <td style="width:10em"><a href="pedidos.php?pedido=<?php echo $pedido['ID_COMPRA'];?>" class="btn btn-primary">Ver Produtos</a></td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script>
  url = new URL(location.href)
  if (url.searchParams.get('pedido')) {
    const modalInformacoesPedido = new bootstrap.Modal(document.querySelector('#modalInformacoesPedido'))
    modalInformacoesPedido.show()
  }
</script>
</html>