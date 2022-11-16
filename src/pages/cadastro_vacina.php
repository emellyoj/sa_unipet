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
                petshopSideBar('cadastro_vacina.php'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Cadastrar vacina</h1>
                <form class="text-start p-5" method="POST" action="/sa_unipet/backend/cadastro_vacina.php" enctype="multipart/form-data">
                    <div>
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="descricao_vacina">Descrição da vacina</label>
                        <textarea name="descricao_vacina" id="descricao_vacina" cols="30" rows="10" class="form-control" style="rezise: none; height: 10em; width:100%; max-height: 5em; min-height: 5em;"></textarea>
                    </div>
                
                    
                    <div class="mt-3 text-end">
                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                    </div>
                </form>


            </div>

</body>

</html>