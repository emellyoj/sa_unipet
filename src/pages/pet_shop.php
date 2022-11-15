<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%; height: 100%;">
        <div class="row h-100">
        <!-- Coluna da esquerda -->
            <?php 
                include('_sidebar.php');
                petshopSideBar('pet_shop');
            ?>

            <!-- Coluna da direita -->

            <!-- Modal de produto -->
            <?php 
            if ($_GET) {
                if(isset($_GET['produto'])) {
            ?>
            <div class="modal fade" id="modalInformacoesProduto" tabindex="-1" aria-labelledby="modalInformacoesProduto" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalInformacoesProdutoLabel">Adicionar ao carrinho</h1>
                            <a href="pet_shop.php">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </a>
                        </div>
                        <div class="modal-body">
                            <?php 
                            include('../../backend/select_informacoes_produto.php');
                            $informacoesproduto = runInformacoesProduto($_GET['produto']);
                            if ($informacoesproduto) {
                                ?> 
                                <div class="row">
                                    <div class="col">
                                        <img src="<?php echo $informacoesproduto['FOTO_PRODUTO']?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <h4 class="h4">
                                            <span class="fw-bold" >
                                                <?php echo $informacoesproduto['NOME_PRODUTO']?>
                                            </span>
                                        </h4>
                                        <p class="text-secondary">
                                        <?php echo $informacoesproduto['DESCRICAO_PRODUTO']?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                <p class="text-dark">
                                    <span class="fw-bold pe-1">
                                        Quantidade em estoque: 
                                    </span>
                                    <?php echo $informacoesproduto['QUANT_ESTOQUE']; ?>
                                </p>
                                </div>
                                <?php
                                if ($informacoesproduto['QUANT_ESTOQUE'] > 0) {
                                ?>
                                    <form action="../../backend/add_no_carrinho.php?id_produto=<?php echo $_GET['produto'] ?>" method="post" >
                                        <div class="modal-footer w-100">
                                            <div class="row justify-content-start w-100 ">
                                                <div class="col-3 ps-0 d-flex align-items-center">
                                                    <span class="text-dark">
                                                        R$ <span class="text-dark" id="preco"> 
                                                            <?php echo $informacoesproduto['PRECO_PRODUTO'];?>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-3"></div>
                                                <div class="col-3">
                                                    <input type="number" class="form-control" name="quantidade" id="quantidade" value="1"
                                                    min="1" max="<?php echo $informacoesproduto['QUANT_ESTOQUE']; ?>">
                                                </div>
                                                <!-- Esse campo de texto fica escondido
                                                Sua função é armazenar o preço do produto
                                                Dentro de um input para ser acessado na variavel $_POST -->
                                                <input type="number" id="precoproduto" name="precoproduto" 
                                                style="display:none" value="<?php echo $informacoesproduto['PRECO_PRODUTO']; ?> " required>
                                                <div class="col-3">
                                                    <input type="submit" class="btn btn-primary" value="Adicionar">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
                                <?php
                            }
                            else {
                            header ('location:/sa_unipet/src/pages/pet_shop.php');
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
            <!-- Fim Modal de produto -->


            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Pet Shop</h1>
                <div class="p-5">


                    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-3">
                        <?php
                        include('../../backend/select_produtos.php')
                     ?>
                    </div>
                </div>
            </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script>
  url = new URL(location.href)
  if (url.searchParams.get('produto')) {
    const modalInformacoesProduto = new bootstrap.Modal(document.querySelector('#modalInformacoesProduto'))
    modalInformacoesProduto.show()
  }
</script>
</html>