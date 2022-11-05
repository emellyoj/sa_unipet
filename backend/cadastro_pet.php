<?php
    include("conexao.php");

    $nome_pet = $_POST["nomepet"];
    $genero_pet = $_POST["generopet"];
    $raca_pet = $_POST["racapet"];

    $comando = $pdo -> prepare("INSERT INTO PET(NOME_PET,GENERO_PET,RACA_PET) VALUES(:nome_pet,:genero_pet,:raca_pet)");

    $comando->bindValue(":nome_pet",$nome_pet);                                     
    $comando->bindValue(":genero_pet",$genero_pet);  
    $comando->bindValue(":raca_pet",$raca_pet);                                     
 
    $comando->execute();  
    
    $pet_id=$pdo->lastInsertId();
    unset($comando);                           

    $comando = $pdo -> prepare("INSERT INTO USUARIO_PET(FK_PET,FK_USUARIO) VALUES(:fk_pet,:fk_usuario);");

    session_start();

    $comando->bindValue(':fk_pet',(int)$pet_id);
    $comando->bindValue(':fk_usuario',(int)$_SESSION['pk_usuario']);

    $comando->execute();
    
    header("Location:/sa_unipet/src/pages/agenda_pet.php");

?>