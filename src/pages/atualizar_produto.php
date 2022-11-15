<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Produto</title>
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
                include('../../backend/select_informacoes_produto.php');
                $informacoes_produto=runInformacoesProduto($_GET['produto']); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Atualizar produto</h1>
                <form class="text-start p-5" method="POST" action="/sa_unipet/backend/update_produto.php?produto=<?php echo ($_GET['produto']);?>" enctype="multipart/form-data">
                    <div>
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" value='<?php echo $informacoes_produto["NOME_PRODUTO"] ?>'>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="preco">Preço</label>
                        <input type="number" step="0.01" min="0" id="preco" name="preco" class="form-control" value='<?php echo $informacoes_produto["PRECO_PRODUTO"] ?>'>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="quant_estoque">Quantidade em estoque</label>
                        <input type="number" min="0" id="quant_estoque" name="quant_estoque" class="form-control" value='<?php echo $informacoes_produto["QUANT_ESTOQUE"] ?>'>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="descricao_produto">Descrição do produto</label>
                        <textarea name="descricao_produto" id="descricao_produto" cols="30" rows="10" class="form-control" style="rezise: none; height: 10em; width:100%; max-height: 5em; min-height: 5em;">
<?php echo $informacoes_produto["DESCRICAO_PRODUTO"] ?>
                    </textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="imagem">Imagem</label><br>
                        <img src="<?php echo $informacoes_produto["FOTO_PRODUTO"]?>" alt="" class="img-fluid" width=25% id="change">
                        <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*" value='<?php echo $informacoes_produto["FOTO_PRODUTO"] ?>' onchange="changeImage(this);">
                    </div>
                    
                    <div class="mt-3">
                        <input class="form-check-input" id="disponivel" name="disponivel" type="checkbox" value="1" <?php echo ($informacoes_produto["DISPONIVEL_VENDA"]== 1) ? "checked": "" ;?>>
                        <label for="disponivel"class="form-label ms-1">Disponivel para venda</label>
                    </div>
                    
                    <div class="mt-3 text-end">
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                    </div>
                </form>


            </div>

</body>
<script>
    function changeImage(input){
        let reader = new FileReader();

        newImage = input.files[0]


        reader.onloadend = function() {
            document.querySelector('#change').src = reader.result 
        }
        reader.readAsDataURL(newImage);
    }



</script>
</html>