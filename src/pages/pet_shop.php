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
                petshopSideBar('pet_shop', true);
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Pet Shop</h1>
                <div class="p-5">


                    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
                        <?php
                        include('../../backend/select_produtos.php')
                     ?>
                    </div>
                </div>
            </div>

</body>

</html>