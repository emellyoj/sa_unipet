<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow: hidden; width: 100vw;">
    <div style="position: absolute; width: 100%;">
        <div class="row" style="height:100vh">
            <!-- Coluna da esquerda -->
            <?php 
                include('_sidebar.php');
                petshopSideBar('cadastro_produto'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Cadastrar produto</h1>
                <form class="text-start p-5" method="POST" action="/sa_unipet/backend/cadastro_produto.php" enctype="multipart/form-data">
                    <div>
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="preco">Preço</label>
                        <input type="number" step="0.01" min="0" id="preco" name="preco" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="quant_estoque">Quantidade em estoque</label>
                        <input type="number" min="0" id="quant_estoque" name="quant_estoque" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="descricao_produto">Descrição do produto</label>
                        <textarea name="descricao_produto" id="descricao_produto" cols="30" rows="10" class="form-control" style="rezise: none; height: 10em; width:100%; max-height: 5em; min-height: 5em;"></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="imagem">Inserir imagem</label>
                        <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*">
                    </div>
                    
                    <div class="mt-3">
                        <input class="form-check-input" id="disponivel" name="disponivel" type="checkbox" value="1" checked>
                        <label for="disponivel"class="form-label ms-1">Disponivel para venda</label>
                    </div>
                    
                    <div class="mt-3 text-end">
                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                    </div>
                </form>


            </div>

</body>

</html>