<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <script src="../js/escolhahora.js"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body style="overflow: hidden;">
    <div style="position: absolute; width: 100%; height:100%;">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('../../backend/verifiy_logged_user.php');
                include('_sidebar.php');
                mainSideBar('agenda'); 
            ?>
    
</body>
</html>