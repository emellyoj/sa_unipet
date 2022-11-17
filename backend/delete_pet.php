<?php
    include("conexao.php");
    
    $comando = $pdo->prepare("DELETE FROM PET WHERE ID_PET=:pet;");

    $comando->bindValue(':pet',$_GET['pet']);
    
    $comando->execute();
    
    unset($comando);
    unset($pdo);
    header("location:/sa_unipet/src/pages/perfil_usuario.php");

?>
